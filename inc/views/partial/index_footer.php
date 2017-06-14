<?php
function share($r)
{
    if ($r == true) {
        $urltbs = 'http://' . $_SERVER['HTTP_HOST'];
    } else {
        $urltbs = curPageURL();
    }
    $fb = '<iframe style=\'border: none;overflow: hidden;height: 21px;width: 75px;position: relative;\' src=\'https://www.facebook.com/plugins/like.php?api_key=528681383869207&href=' . urlencode($urltbs) . '&node_type=link&width=90&layout=button_count&colorscheme=light&show_faces=false&send=false&extended_social_context=false\'></iframe>';
    $tw = '<iframe style=\'border: none;overflow: hidden;height: 21px;width: 77px;position: relative;margin-left: 10px;\' src=\'https://platform.twitter.com/widgets/tweet_button.1375828408.html#_=1377268257182&count=horizontal&id=twitter-widget-2&lang=en&size=m&url=' . urlencode($urltbs) . '&node_type=link&width=90&layout=button_count&colorscheme=light&show_faces=false&send=false&extended_social_context=false\'></iframe>';
    $gp = '<div style="margin-left: 10px;display: inline-block;"><div class="g-plusone" data-size="medium"></div></div>';
    $gp .= "<script type='text/javascript'>(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>";
    return $fb . $tw . $gp;
}

?>
<div class="footer">
  <div>
      <a href="https://demos.subinsb.com/" style="color:white;text-decoration:none;" class="btn blue">Home</a>
      <a href="https://subinsb.com" style="color:white;text-decoration:none;margin-left:10px;" class="btn blue">Blog</a>
      <a href="https://subinsb.com/donate" style="color:white;text-decoration:none;margin-left:10px;" class="btn blue">Donate</a>
      &nbsp;&nbsp;&nbsp;
  </div><br/>
  <div>
    <?php
    if ($_SERVER['SERVER_NAME'] != 'demos.sim') {
        echo share(true);
    }
    ?>
  </div><br/>
  <div>
  &copy; Copyleft <a href="https://subinsb.com">Subin Siby</a>                                                         <?php echo '2011-' . date('Y'); ?>
  </div>
  <?php
  require_once __DIR__ . '/track.php';
  ?>
</div>
