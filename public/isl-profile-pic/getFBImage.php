<?php
//header('Content-Type: image/jpeg');

if (isset($_GET['at'])) {
    $url = 'https://graph.facebook.com/v2.7/me/picture?access_token=' . htmlspecialchars($_GET['at']) . '&callback=FB.__globalCallbacks.f2fa484497f7814&height=640&method=get&pretty=0&redirect=false&sdk=joey';

    $j = json_decode(file_get_contents($url), true);

    var_dump($j);

    echo file_get_contents($j['data']['url']);
}
