<?php
$demoIndex   = $this->demoInfo['index'];
$demoTitle   = $this->demoInfo['title'];
$tutorialURL = $this->demoInfo['url'];
$demoURL     = $this->demoInfo['demo'];
?>
<!DOCTYPE html>
<html>
    <head>
        <?php if ($demoTitle === '') {?>
            <title>Download - Subin's Blog Demos</title>
        <?php
        } else {
            ?>
            <title><?php echo $demoTitle; ?> | Download - Subin's Blog Demos</title>
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
            if ($demoTitle == '') {
                die('<h2>No Demo/Download Found</h2>');
            }
            ?>
            <center>
                <h1>Download Demo</h1>
                <h3><?php echo $demoTitle; ?></h3>
            </center>
            <center>
                <div>
                    <a href="<?php echo $tutorialURL; ?>" target="_blank" class="btn green">Tutorial</a>
                    <a href="<?php echo $demoURL; ?>" target="_blank" class="btn blue">Demo</a>
                </div>
                <br/>
                <p><a href="/download-confirm/<?php echo $demoIndex; ?>" target="_blank" class="btn btn-large red">Download !</a></p>
            </center>
        </div>
        <?php require_once __DIR__ . '/partial/index_footer.php';?>
    </body>
</html>
