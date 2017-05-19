<?php
$GLOBALS['pid'] = null;

require_once __DIR__ . '/config.php';
include __DIR__ . '/posts.php';
$GLOBALS['demoList'] = $demoList;

function init($pid)
{
    $GLOBALS['pid']     = $pid;
    $GLOBALS['curDemo'] = $GLOBALS['demoList'][$GLOBALS['pid']];
    $GLOBALS['title']   = $GLOBALS['curDemo']['title'];
}

function curPageURL($http = false)
{
    if ($http) {
        $pageURL = 'http://';
    } else {
        $pageURL = 'https://';
    }

    $pageURL .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    return $pageURL;
}

function head($title = '')
{
    $id   = $GLOBALS['pid'];
    $demoList = $GLOBALS['demoList'];

    if ($title == '') {
        $title = $GLOBALS['demoList'][$GLOBALS['pid']]['title'];
    }

    require_once __DIR__ . '/views/head.php';

    if ($_SERVER['HTTP_HOST'] != 'demos' . '.sim') {
        require_once __DIR__ . '/track.php';
    }
}

function top()
{
    global $dbh;
    include __DIR__ . '/views/header.php';
}

function footer()
{
    if ($_SERVER['HTTP_HOST'] != 'demos.sima') {
        $postURL = $GLOBALS['demoList'][$GLOBALS['pid']]['url'];
        include __DIR__ . '/views/footer.php';
    }
}
