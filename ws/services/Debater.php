<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class DebaterServer implements MessageComponentInterface {
  protected $clients;
  private $dbh;
  private $users = array();

  public function __construct() {
    global $dbh, $docRoot;
    $this->clients = array();
    $this->dbh = $dbh;

    $this->root = $docRoot;
    date_default_timezone_set('UTC');
  }

  public function onOpen(ConnectionInterface $conn) {
    $this->clients[$conn->resourceId] = $conn;
    echo "New connection! ({$conn->resourceId})\n";
  }

  public function onMessage(ConnectionInterface $conn, $data) {
    $id  = $conn->resourceId;
    var_dump(strlen($data));
  }

  public function onClose(ConnectionInterface $conn) {
    unset($this->clients[$conn->resourceId]);
  }

  public function onError(ConnectionInterface $conn, \Exception $e) {
    $conn->close();
    $this->checkOnliners();
  }

  public function send(ConnectionInterface $client, $type, $data){
    $send = array(
      "type" => $type,
      "data" => $data
      );
    $send = json_encode($send, true);
    $client->send($send);
  }

}
?>
