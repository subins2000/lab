<?php
require_once __DIR__ . '/../../inc/load.php';
require_once __DIR__ . '/phpcount.php';

$count = 0;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    header('Content-Type: application/javascript; charset=utf-8');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');

    PHPCount::setDBAdapter($dbh);
    PHPCount::AddHit($id);

    $count = PHPCount::getHits($id);
}
?>
var a = document.getElementById('sanders-page-counter');
a.innerHTML = '<b><?php echo $count;?></b>';
a.title = 'since 2020';