<?php
require_once __DIR__ . '/../../inc/load.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <title>Download Profile Picture | Support Kerala Blasters !</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet" async="async" />
        <meta property="og:title" content="Support Kerala Blasters!" />
        <meta property="og:url" content="http://demos.subinsb.com/isl-profile-pic/" />
        <meta property="og:image" content="http://demos.subinsb.com/isl-profile-pic/image/og-logo.png" />

        <meta name="description" content="Support Kerala Blasters by changing your profile picture. You can directly upload
        it to Facebook or download the image." />
        <meta property="og:description" content="Support Kerala Blasters by changing your profile picture. You can directly upload it to Facebook or download the image." />

        <meta property="fb:app_id" content="1046604178789662" />
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1><a href="<?php echo $siteURL;?>/isl-profile-pic/">Support Kerala Blasters!</a></h1>
                <p>Support Kerala Blasters by changing your profile picture</p>
            </div>
            <div class="container" id="content">
                <p>Make this as your profile picture to support Blasters !</p>
                <?php
                $url = htmlspecialchars($_GET['i']);
                if (isset($_GET['i'])) {
                        echo "<a href='" . $url . "' download='kerala-blasters-profile'><img src='" . $url . "' /></a>";
                } else {
                        header('Redirect: index.php');
                }

                ?>
                <p>
                    Click the above image to download.<br/>Or hold down on image and choose "Save Image"
                </p>
                <p>
                    <a href="<?php echo $siteURL; ?>/isl-profile-pic/"><button class="btn">Create Another Profile Picture!</button></a>
                </p>
                <?php
                require 'footer.php'
                ;?>
            </div>
        </div>
    </body>
</html>
