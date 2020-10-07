<?php
require_once __DIR__ . '/../../inc/load.php';
require_once __DIR__ . '/phpcount.php';

PHPCount::setDBAdapter($dbh);
?>
<table>
    <tbody>
        <?php
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        try {
            $sth = $dbh->query('TRUNCATE nodupes;');
            $sth = $dbh->query('SELECT DISTINCT pageid FROM `hits` ORDER BY `hits` LIMIT 20');
            while($r = $sth->fetch()) {
                echo '<tr>';
                    echo '<td>' . htmlspecialchars($r['pageid']) . '</td>';
                    echo '<td>' . PHPCount::GetHits($r['pageid']) . '</td>';
                echo '</tr>';
            }
        } catch(Exception $e) {
            var_dump($e->getMessage());
        }
        ?>
    </tbody>
</table>
<?php
echo "<b>Total hitcount</b> : " . PHPCount::GetTotalHits();
?>