<?php
if ($this->code === 404) {
?>
    <h1>404</h1>
    <p>It looks like <blockquote><?php echo $this->escape($this->page); ?></blockquote> doesn't exist.</p>
    <p>
        <a href="/">Why don't you go Home ?</a>
        <a href="https://subinsb.com">Or you may head to Subin's Blog</a>
    </p>
<?php
} else if($this->code === 403) {
?>
    <h1>Oops</h1>
    <p>Nothing to see here. Go on with your life</p>
    <p>
        <a href="/">Why don't you go Home ?</a>
        <a href="https://subinsb.com">Or you may head to Subin's Blog</a>
    </p>
<?php
} else {
?>
    <h1><?php echo $this->code; ?></h1>
    <p>This page is broken. Tell Subin about this.</p>
<?php
}
?>
