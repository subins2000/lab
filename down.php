<?php
require_once 'inc/load.php';
require_once 'inc/posts.php';
$pid = isset($_GET['class']) ? htmlspecialchars($_GET['class']) : null;
$id  = $parr[$pid]['down'];
$t   = $parr[$pid]['title'];
$tut = $parr[$pid]['url'];
$dm  = $parr[$pid]['d'];
?>
<!DOCTYPE html>
<html>
    <head>
        <?php if ($t === '') {?>
            <title>Download - Subin's Blog Demos</title>
        <?php
        } else {
            ?>
            <title><?php echo $t; ?> | Download - Subin's Blog Demos</title>
        <?php
        }
        head();
        ?>
    <link href='//demos.sim/assets/css/index.css' rel='stylesheet' />
    </head>
    <body>
        <?php top();?>
        <div class="container" id="content">
            <?php
            if ($t == '') {
                die('<h2>No Demo/Download Found</h2>');
            }
            ?>
            <center>
        <h1>Download Demo</h1>
        <h3><?php echo $t; ?></h3>
      </center>
            <center>
                <div>
                    <a href="<?php echo $tut; ?>" target="_blank" class="btn green">Tutorial</a>
                    <a href="<?php echo $dm; ?>" target="_blank" class="btn blue">Demo</a>
                </div>
                <br/>
                <?php
                if (preg_match('/github/', $id)) {
                    ?>
                    <p><a href="/download.php?id=<?php echo $pid; ?>" target="_blank" class="btn btn-large red">Download !</a></p>
                <?php
                } else {?>
                    <iframe src="https://app.box.com/embed_widget/<?php echo $id; ?>?view=list&sort=name&direction=ASC&theme=dark" width="500" height="400" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
                <?php
                }
                ?>
            </center>
        </div>
        <?php require 'inc/views/index_footer.php';?>
    </body>
</html>
