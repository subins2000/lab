<?php
$GLOBALS['curDemoIndex'] = null;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/demos.php';

$GLOBALS['demoList'] = $demoList;

function init($pid)
{
    $GLOBALS['curDemoIndex'] = $pid;
    $GLOBALS['curDemo']      = $GLOBALS['demoList'][$GLOBALS['curDemoIndex']];
    $GLOBALS['title']        = $GLOBALS['curDemo']['title'];
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
    $demoIndex = $GLOBALS['curDemoIndex'];
    $demoList  = $GLOBALS['demoList'];

    if ($title === '' && $demoIndex && isset($demoList[$demoIndex])) {
        $title = $demoList[$demoIndex]['title'];
    }

    require_once __DIR__ . '/views/partial/head.php';

    if ($_SERVER['HTTP_HOST'] != 'demos' . '.sim') {
        require_once __DIR__ . '/views/partial/track.php';
    }
}

function top()
{
    global $dbh;
    include __DIR__ . '/views/partial/header.php';
}

function footer()
{
    if ($_SERVER['HTTP_HOST'] != 'demos.sima') {
        $postURL = $GLOBALS['demoList'][$GLOBALS['curDemoIndex']]['url'];
        include __DIR__ . '/views/partial/footer.php';
    }
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
