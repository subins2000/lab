<?php
$rootDir            = dirname(__DIR__);
$GLOBALS['rootDir'] = $rootDir;

$curDemoIndex = $GLOBALS['curDemoIndex'] = $curDemo = $GLOBALS['curDemo'] = null;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/demos.php';

$GLOBALS['demoList'] = $demoList;

function init($pid)
{
    $GLOBALS['curDemoIndex'] = $pid;
    $GLOBALS['curDemo']      = $GLOBALS['demoList'][$GLOBALS['curDemoIndex']];
    $GLOBALS['title']        = $GLOBALS['curDemo']['title'];
}

function runWSServer()
{
    $pathToRunFile = $GLOBALS['rootDir'] . '/ws/run.php';
    $pathToLogFile = $GLOBALS['rootDir'] . '/ws/ws.log';

    $processes = shell_exec('ps auxH | grep run.php');

    if (strpos($processes, $pathToRunFile) === false) {
        $command = 'nohup /app/.heroku/php/bin/php "' . $pathToRunFile . '" > "' . $pathToLogFile . '" 2>&1 &';
    }
}

function curPageURL($http = false)
{
    global $siteHostname;

    if ($http) {
        $pageURL = 'http://';
    } else {
        $pageURL = 'https://';
    }

    $pageURL .= $siteHostname . $_SERVER['REQUEST_URI'];
    return $pageURL;
}

function head($title = '')
{
    global $siteURL, $siteHostname;
    $demoIndex = $GLOBALS['curDemoIndex'];
    $demoList  = $GLOBALS['demoList'];

    if ($title === '' && $demoIndex && isset($demoList[$demoIndex])) {
        $title = $demoList[$demoIndex]['title'];
    }

    require_once __DIR__ . '/views/partial/head.php';
    require_once __DIR__ . '/views/partial/track.php';
}

function top()
{
    global $siteURL, $dbh;
    require_once __DIR__ . '/views/partial/header.php';
}

function footer()
{
    global $siteURL, $siteHostname;

    runWSServer();

    $postURL = $GLOBALS['demoList'][$GLOBALS['curDemoIndex']]['url'];
    require_once __DIR__ . '/views/partial/footer.php';
}

function getDemoInfo($demoID)
{
    foreach ($GLOBALS['demoList'] as $index => $demo) {
        if ($demo['id'] === $demoID) {
            $demo['index'] = $index;
            return $demo;
        }
    }
    return false;
}
