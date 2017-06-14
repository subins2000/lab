<?php
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class ChatServer implements MessageComponentInterface
{
    protected $clients;
    private $dbh;
    private $users = array();

    public function __construct()
    {
        global $dbh, $docRoot;
        $this->clients = new \SplObjectStorage;
        $this->dbh     = $dbh;
        $this->root    = $docRoot;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        $this->send($conn, 'fetch', $this->fetchMessages());
        $this->checkOnliners();
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $data)
    {
        $id   = $from->resourceId;
        $data = json_decode($data, true);
        if (isset($data['data']) && count($data['data']) != 0) {
            $type = $data['type'];
            $user = isset($this->users[$id]) ? $this->users[$id]['name'] : false;
            if ($type == 'register') {
                $name             = htmlspecialchars($data['data']['name']);
                $this->users[$id] = array(
                    'name' => $name,
                    'seen' => time(),
                );
            } elseif ($type == 'send' && $user !== false) {
                $msg = htmlspecialchars($data['data']['msg']);
                $sql = $this->dbh->prepare('INSERT INTO `wsMessages` (`name`, `msg`, `posted`) VALUES(?, ?, NOW())');
                $sql->execute(array($user, $msg));
                foreach ($this->clients as $client) {
                    $this->send($client, 'single', array('name' => $user, 'msg' => $msg, 'posted' => date('Y-m-d H:i:s')));
                }
            } elseif ($type == 'fetch') {
                $this->send($from, 'fetch', $this->fetchMessages());
            }
        }
        $this->checkOnliners($from);
    }

    public function onClose(ConnectionInterface $conn)
    {
        if (isset($this->users[$conn->resourceId])) {
            unset($this->users[$conn->resourceId]);
        }
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
    }

    /* My custom functions */
    public function fetchMessages()
    {
        $sql  = $this->dbh->query('SELECT * FROM `wsMessages`');
        $msgs = $sql->fetchAll();
        return $msgs;
    }

    public function checkOnliners($curUser = '')
    {
        date_default_timezone_set('UTC');
        if ($curUser != '' && isset($this->users[$curUser->resourceId])) {
            $this->users[$curUser->resourceId]['seen'] = time();
        }

        $curtime = strtotime(date('Y-m-d H:i:s', strtotime('-5 seconds', time())));
        foreach ($this->users as $id => $user) {
            $usertime = $user['seen'];
            if ($usertime < $curtime) {
                unset($this->users[$id]);
            }
        }

        /* Send online users to evryone */
        $data = $this->users;
        foreach ($this->clients as $client) {
            $this->send($client, 'onliners', $data);
        }
    }

    public function send($client, $type, $data)
    {
        $send = array(
            'type' => $type,
            'data' => $data,
        );
        $send = json_encode($send, true);
        $client->send($send);
    }
}
