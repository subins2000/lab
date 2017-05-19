<?php
$filename = "My 2nd WordPress Plugin.zip";
$filepath = $_SERVER['DOCUMENT_ROOT']."/WordPress/code-blocks.zip";
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-type: application/octet-stream");
header('Content-Disposition: attachment; filename="'.$filename.'"');
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filepath));
ob_end_flush();
@readfile($filepath);
?>
