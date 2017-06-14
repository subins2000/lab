<?php
require_once __DIR__ . "/../../inc/views/partial/track.php";
?>
<div id="comments">
  <p>Created by <a href="http://subinsb.com">Subin Siby</a>.</p>
  <p>Designs By <a href="https://www.facebook.com/vikaskkunjumon">Vikas</a>, <a href="https://www.facebook.com/maneesh.redline">Maneesh</a></p>
  <?php
  if($_SERVER["SCRIPT_NAME"] === "/isl-profile-pic/download.php"){
  ?>
    <p>
      Please share to your friends ! Show the world how strong Kerala Blasters fans are !
      <div class="addthis_inline_share_toolbox"></div>
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4fb122922591215b" async="async"></script>
    </p>
  <?php
  }
  ?>
  <p>Please tell me your feedback and suggestions below :</p>
  <div id="disqus_thread"></div>
  <script>
  var disqus_config = function () {
      this.page.url = "http://demos.subinsb.com/isl-profile-pic";
      this.page.identifier = "demos-isl-profile-pic";
  };
  (function() { // DON'T EDIT BELOW THIS LINE
      var d = document, s = d.createElement('script');
      s.src = '//subinsblog.disqus.com/embed.js';
      s.setAttribute('data-timestamp', +new Date());
      (d.head || d.body).appendChild(s);
  })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
