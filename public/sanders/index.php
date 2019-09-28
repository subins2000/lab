<?php
require_once __DIR__ . '/../../inc/load.php';
require_once __DIR__ . '/phpcount.php';

PHPCount::setDBAdapter($dbh);
?>
<table>
    <tbody>
        <?php
        $sth = $dbh->query('TRUNCATE nodupes;');
        $sth = $dbh->query('SELECT DISTINCT pageid FROM `hits`');
        while($r = $sth->fetch()) {
            echo '<tr>';
                echo '<td>' . htmlspecialchars($r['pageid']) . '</td>';
                echo '<td>' . PHPCount::GetHits($r['pageid']) . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<?php
echo "<b>Total hitcount</b> : " . PHPCount::GetTotalHits();
?>