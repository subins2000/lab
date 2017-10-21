<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChessServer implements MessageComponentInterface {

  protected $clients = array();
  private $dbh;
  private $users = array();

  public function __construct() {
    global $dbh, $docRoot;
    $this->dbh = $dbh;
    date_default_timezone_set('UTC');
  }

  public function onOpen(ConnectionInterface $conn) {
    $this->clients[$conn->resourceId] = $conn;
    echo "New connection! ({$conn->resourceId})\n";
  }

  /**
   * Player Statuses
   * ===============
   * 0 = Available
   * 1 = Busy
   */
  public function onMessage(ConnectionInterface $conn, $message) {
    $id  = $conn->resourceId;
    if($message === "playersCount"){
      $sql = $this->dbh->query("SELECT COUNT(1) - 1 FROM `chessPlayers` WHERE `status` != '1'");
      $this->sendToAll("playersCount", $sql->fetchColumn());
    }else if($message === "players"){
      $sql = $this->dbh->query("SELECT * FROM `chessPlayers` WHERE `status` != '1'");
      $this->send($conn, "players", $sql->fetchAll(\PDO::FETCH_ASSOC));
    }else if(substr($message, 0, 9) === "register-"){
      $username = htmlspecialchars(substr($message, 9));
      if($username == null)
        $username = "user_" . rand(0, 2000);

      $sql = $this->dbh->prepare("INSERT INTO `chessPlayers` (`username`, `status`) VALUES (?, ?)");
      $sql->execute(array($username, "0"));

      $this->users[$conn->resourceId] = $username;
    }
  }

  public function onClose(ConnectionInterface $conn) {
    unset($this->clients[$conn->resourceId]);
    $sql = $this->dbh->prepare("DELETE FROM `chessPlayers` WHERE `username` = ?");
    $sql->execute(array($this->users[$conn->resourceId]));
  }

  public function onError(ConnectionInterface $conn, \Exception $e) {
    $conn->close();
  }

  public function send(ConnectionInterface $client, $type, $data = ""){
    $send = array(
      "type" => $type,
      "data" => $data
    );
    $send = json_encode($send, true);
    $client->send($send);
  }

  public function sendToAll($type, $data = ""){
    foreach($this->clients as $client){
      $this->send($client, $type, $data);
    }
  }

}
?>
