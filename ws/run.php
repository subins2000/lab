<?php
require_once __DIR__ . '/config.php';

$host = '127.0.0.1';
$port = '8000';

require_once "$docRoot/services/TextChat.php";
require_once "$docRoot/services/VoiceChat.php";
require_once "$docRoot/services/AdvancedChat.php";
require_once "$docRoot/services/Pi.php";
require_once "$docRoot/services/Chess.php";
require_once "$docRoot/services/Debater.php";


$app = new Ratchet\App($host, $port, '0.0.0.0');
$app->route('/text-chat', new TextChatServer, ['*']);
$app->route('/voice-chat', new VoiceChatServer, ['*']);
$app->route('/advanced-chat', new AdvancedChatServer, ['*']);
$app->route('/pi', new PiServer, ['*']);
$app->route('/chess', new ChessServer, ['*']);
$app->route('/debater', new DebaterServer, ['*']);
$app->run();
