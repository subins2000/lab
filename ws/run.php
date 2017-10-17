<?php
require_once __DIR__ . '/config.php';

$host = '127.0.0.1';
$port = '8000';

$DS = new Fr\DiffSocket(array(
    'server'   => array(
        'host' => $host,
        'port' => $port,
    ),
    'services' => array(
        'text-chat'     => "$docRoot/services/TextChat.php",
        'voice-chat'    => "$docRoot/services/VoiceChat.php",
        'advanced-chat' => "$docRoot/services/AdvancedChat.php",
        'pi'            => "$docRoot/services/Pi.php",
        'chess'         => "$docRoot/services/Chess.php",
        'debater'       => "$docRoot/services/Debater.php",
    ),
    'debug'    => true,
));
$DS->run();
