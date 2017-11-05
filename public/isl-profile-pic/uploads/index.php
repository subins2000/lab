<h2>No Directory Listing</h2>
<?php
function humanFilesize($bytes, $decimals = 2)
{
    $sz     = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

if (isset($_GET[getenv('demo45_dir_list')])) {
    function scanTheDir($dir)
    {
        $ignored = array('.', '..');

        $files = array();
        foreach (scandir($dir) as $file) {
            if (in_array($file, $ignored)) {
                continue;
            }

            $files[$file] = filemtime($dir . '/' . $file);
        }

        arsort($files);
        $files = array_keys($files);

        return ($files) ? $files : false;
    }

    $files = scanTheDir(__DIR__);

    echo '<p>Number of photos - ' . (count($files) - 3) . '</p>';

    date_default_timezone_set('Asia/Kolkata');
    foreach ($files as $file) {
        if (is_file($dir . $file)) {
            echo "<a href='$file'>$file</a>   - " . date('F d Y H:i:s.', filemtime($dir . $file)) . '  -- ' . humanFilesize(filesize($dir . $file)) . '<br/>';
        }
    }
}
?>
