<?php
require_once __DIR__ . '/..//inc/load.php';
require_once __DIR__ . '/inc/config.php';

if (isset($_GET['id'])) {
    $pid = $_GET['id'];
    init($pid);
    $sql = $dbh->prepare('SELECT 1 FROM `downloads` WHERE `id` = ?');
    $sql->execute(array($_GET['id']));

    if ($sql->rowCount() === 0) {
        $sql = $dbh->prepare("INSERT INTO `downloads` (`id`, `counter`) VALUES (?, '1')");
        $sql->execute(array($_GET['id']));
    } else {
        $sql = $dbh->prepare('UPDATE `downloads` SET `counter` = `counter` + 1 WHERE `id` = ?');
        $sql->execute(array($_GET['id']));
    }
    $url = $GLOBALS['demoList'][$pid]['down'];
    header("Location: $url");
}
