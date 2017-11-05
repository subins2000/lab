<?php
require_once __DIR__ . '/ImageResize.php';

use \Eventviva\ImageResize;

function makeDP($sourceLocation, $design = null)
{
    if ($design == null) {
        $design = 'dp-fg.png';
    } else if (in_array($design, array(1, 2))) {
        $design = "dp-fg-$design.png";
    } else {
        exit;
    }

    $width = $height = 400;

    $image = new ImageResize($sourceLocation);
    $image->resizeToBestFit($width, $height);
    $image->save($sourceLocation);

    $src = imagecreatefromstring(file_get_contents($sourceLocation));
    $fg  = imagecreatefrompng(__DIR__ . "/../image/$design");

    list($srcWidth, $srcHeight) = getimagesize($_FILES['image']['tmp_name']);

    // Start merging
    $out = imagecreatetruecolor($width, $height);
    imagecopyresampled($out, $src, 0, 0, 0, 0, $width, $height, $width, $height);
    imagecopyresampled($out, $fg, 0, 0, 0, 0, $width, $height, $width, $height);

    ob_start();
    imagepng($out);
    $image = ob_get_clean();
    return $image;
}
