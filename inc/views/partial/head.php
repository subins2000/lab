<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css" rel="stylesheet" async="async" />
<link href="<?php echo $siteURL;?>/assets/css/style.css" rel="stylesheet" async="async" />
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Ubuntu' async="async" />

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta charset="utf-8" />

<link rel="canonical" href="<?php echo curPageURL(); ?>">
<meta property="og:url" content="<?php echo curPageURL(true); ?>" />
<meta property="fb:app_id" content="1743177649331232" />
<meta property="fb:admins" content="100002500421081" />

<title>
<?php
if ($title === 'index') {
    echo "Subin's Lab - Coding Experiments";
} else {
    echo $title . " - Subin's Lab";
}
?>
</title>
