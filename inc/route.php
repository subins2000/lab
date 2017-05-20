<?php
require_once __DIR__ . '/load.php';
require_once __DIR__ . '/vendor/autoload.php';

$klein = new \Klein\Klein();

$klein->respond('GET', '/down.php', function ($request, $response) {
    if (isset($_GET['class']) && isset($GLOBALS['demoList'][$_GET['class']])) {
        $response->redirect('/download/' . $GLOBALS['demoList'][$_GET['class']]['id'], 301);
    } else {
        $response->redirect('/download/', 301);
    }
});

$klein->respond('GET', '/download/[s:demoID]', function ($request) {
    $demoID = $request->demoID;
    require __DIR__ . '/views/download.php';
});

$klein->respond('GET', '/download-confirm/[s:demoID]', function ($request) {
    $demoID = $request->demoID;

    if (isset($GLOBALS['demoList'][$request->demoID])) {
        $sql = $dbh->prepare('SELECT 1 FROM `downloads` WHERE `id` = ?');
        $sql->execute(array($demoID));

        if ($sql->rowCount() === 0) {
            $sql = $dbh->prepare("INSERT INTO `downloads` (`id`, `counter`) VALUES (?, '1')");
            $sql->execute(array($demoID));
        } else {
            $sql = $dbh->prepare('UPDATE `downloads` SET `counter` = `counter` + 1 WHERE `id` = ?');
            $sql->execute(array($_GET['id']));
        }
        
        $url = $GLOBALS['demoList'][$demoID]['down'];
        header("Location: $url");
    }
});

$klein->respond('404', function ($request) {
    $page = $request->uri();
    require __DIR__ . '/views/404.php';
});

$klein->dispatch();
