<?php
function makeDP($source, $design = null){
  if($design == null)
    $design = "dp-fg.png";
  else if(in_array($design, array(1, 2)))
    $design = "dp-fg-$design.png";
  else
    exit;

  $src = imagecreatefromstring($source);
  $fg = imagecreatefrompng(__DIR__ . "/image/$design");

  list($width, $height) = getimagesize($_FILES["image"]["tmp_name"]);

  $croppedFG = imagecreatetruecolor($width, $height);

  $background = imagecolorallocate($croppedFG, 0, 0, 0);
  // removing the black from the placeholder
  imagecolortransparent($croppedFG, $background);

  imagealphablending($croppedFG, false);
  imagesavealpha($croppedFG, true);

  imagecopyresized($croppedFG, $fg, 0, 0, 0, 0, $width, $height, 400, 400);

  // Start merging
  $out = imagecreatetruecolor($width, $height);
  imagecopyresampled($out, $src, 0, 0, 0, 0, $width, $height, $width, $height);
  imagecopyresampled($out, $croppedFG, 0, 0, 0, 0, $width, $height, $width, $height);

  ob_start();
  imagepng($out);
  $image = ob_get_clean();
  return $image;
}
