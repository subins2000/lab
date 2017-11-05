<?php
header('Content-Type: image/jpeg');

if (isset($_GET['at'])) {
    $url = 'https://graph.facebook.com/v2.7/me/picture?access_token=' . htmlspecialchars($_GET['at']) . '&height=640';

    echo file_get_contents($j['data']['url']);
}
