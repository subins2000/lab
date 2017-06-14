<h2>No Directory Listing</h2>
<?php
function humanFilesize($bytes, $decimals = 2)
{
    $sz     = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

if (isset($_GET[getenv('demo42_dir_list')])) {
    $files = scandir(__DIR__);
    $array = array();
    foreach ($files as $file) {
        if (is_file($dir . $file)) {
            echo "<a href='//demos.subinsb.com/ajax-image-upload-jquery/uploads/$file'>$file</a>   - " . date('F d Y H:i:s.', filemtime($dir . $file)) . '  -- ' . humanFilesize(filesize($dir . $file)) . '<br/>';
        }
    }
}
?>
