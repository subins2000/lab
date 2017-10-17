<?php
namespace Fr\DiffSocket\Service;

use \Ratchet\ConnectionInterface;
use \Ratchet\RFC6455\Messaging\MessageInterface;
use \Ratchet\WebSocket\MessageComponentInterface;

class VoiceChatServer implements MessageComponentInterface
{
    protected $clients;
    private $dbh;
    private $users = array();

    public function __construct()
    {
        global $dbh, $docRoot;
        $this->clients = array();
        $this->dbh     = $dbh;
        $this->root    = $docRoot;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients[$conn->resourceId] = $conn;
        $this->checkOnliners($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        $id = $conn->resourceId;

        if ($msg->isBinary()) {

        } else {
            $msgData = json_decode($msg->getPayload());

            if (isset($msgData['data']) && count($msgData['data']) != 0) {
                $type = $data['type'];
                $user = isset($this->users[$id]) ? $this->users[$id]['name'] : false;
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        if (isset($this->users[$conn->resourceId])) {
            unset($this->users[$conn->resourceId]);
        }
        $this->checkOnliners($conn);
        unset($this->clients[$conn->resourceId]);
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        if (isset($this->users[$conn->resourceId])) {
            unset($this->users[$conn->resourceId]);
        }
        $conn->close();
        $this->checkOnliners();
    }

    /* My custom functions */
    public function fetchMessages()
    {
        $sql  = $this->dbh->query('SELECT * FROM `wsMessages`');
        $msgs = $sql->fetchAll();
        return $msgs;
    }

    public function checkOnliners(ConnectionInterface $conn)
    {
        date_default_timezone_set('UTC');
        if (isset($this->users[$conn->resourceId])) {
            $this->users[$conn->resourceId]['seen'] = time();
        }

        $limit_time = strtotime('-10 seconds');
        foreach ($this->users as $id => $user) {
            $usertime = $user['seen'];
            if ($usertime < $limit_time) {
                unset($this->users[$id]);
            }
        }

        /**
         * Send online users to everyone
         */
        $data = $this->users;
        foreach ($this->clients as $id => $client) {
            $this->send($client, 'onliners', $data);
        }
    }

    public function send(ConnectionInterface $client, $type, $data)
    {
        $send = array(
            'type' => $type,
            'data' => $data,
        );
        $send = json_encode($send, true);
        $client->send($send);
    }
}
