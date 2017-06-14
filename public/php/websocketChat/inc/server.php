<?php
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

function shutdown()
{
    global $docRoot;
    file_put_contents("$docRoot/inc/serverStatus.txt", '0');
    require_once "$docRoot/inc/startServer.php";
}

register_shutdown_function('shutdown');
if (isset($startNow)) {
    $ip = getenv('OPENSHIFT_PHP_IP');
    require_once "$docRoot/inc/vendor/autoload.php";
    require_once "$docRoot/inc/class.chat.php";
    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new ChatServer()
            )
        ),
        8000,
        $ip
    );
    $server->run();
}
