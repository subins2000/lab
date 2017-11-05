<?php
if (isset($_FILES['image'])) {
    require_once __DIR__ . '/inc/convert.php';
    function randString($length)
    {
        $str   = '';
        $chars = 'subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $size  = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        return $str;
    }

    $sourceImg = @imagecreatefromstring(@file_get_contents($_FILES['image']['tmp_name']));
    if ($sourceImg === false) {
        echo 'image/og-logo.png';
        exit;
    }

    $image = makeDP($_FILES['image']['tmp_name'], (
        isset($_POST['design']) ? $_POST['design'] : null
    ));

    $loc = 'uploads/' . randString(10) . '.png';

    file_put_contents($loc, $image);
    echo $loc;

    imagedestroy($sourceImg);
}
