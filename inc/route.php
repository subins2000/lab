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

$klein->respond('GET', '/download/[s:demoID]', function ($request, $response, $service) use ($klein) {
    $demoInfo = getDemoInfo($request->demoID);

    if ($demoInfo) {
        $service->render(__DIR__ . '/views/download.php', array(
            'demoInfo' => $demoInfo,
        ));
    } else {
        $klein->abort(404);
    }
});

$klein->respond('GET', '/download-confirm/[s:demoIndex]', function ($request, $response) use ($dbh, $siteURL) {
    $demoIndex = $request->demoIndex;

    if (isset($GLOBALS['demoList'][$demoIndex]) && isset($GLOBALS['demoList'][$demoIndex]['download'])) {
        $sql = $dbh->prepare('SELECT 1 FROM `downloads` WHERE `id` = ?');
        $sql->execute(array($demoIndex));

        if ($sql->rowCount() === 0) {
            $sql = $dbh->prepare("INSERT INTO `downloads` (`id`, `counter`) VALUES (?, '1')");
            $sql->execute(array($demoIndex));
        } else {
            $sql = $dbh->prepare('UPDATE `downloads` SET `counter` = `counter` + 1 WHERE `id` = ?');
            $sql->execute(array($demoIndex));
        }

        $download = $GLOBALS['demoList'][$demoIndex]['download'];
        if ($download['type'] === 'github') {
            $url = $download['url'];
        } else {
            $url = $siteURL . '/assets/downloads/' . $download['file'] . '.zip';
        }
        $response->redirect($url);
    } else {
        $response->status(404);
    }
});

$klein->respond('GET', '/sanders/s.js', function($request, $response) use ($dbh) {
    $response->header('Content-Type', 'application/javascript');
    require_once __DIR__ . '/../public/sanders/s.php';
});

$klein->onHttpError(function ($code, $router) {
    $page = $router->request()->uri();

    $router->service()->render(__DIR__ . '/views/error.php', array(
        'code' => $code,
        'page' => $page,
    ));
});

$klein->dispatch();
