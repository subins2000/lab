<?php
if ( isset($GLOBALS['curDemo']) ) {
	$socialURL = "http:" . $GLOBALS['curDemo']['demo'];
} else {
	$socialURL = curPageURL(true);
}
?>
<nav class="nav-extended" id="site-header">
	<div class="row site-face-color">
		<div class="col s12 m7 l4 valign-wrapper">
			<a href="//demos.sim" id="site-logo" class="valign">Subin's Lab</a>
		</div>
		<div class="center hide-on-small-only col m5 l4">
			<div class="social-btn">
				<iframe style="border: none;overflow: hidden;width: 70px;" src="https://www.facebook.com/plugins/like.php?api_key=1743177649331232&href=<?php echo $socialURL;?>&node_type=link&width=70&layout=button_count&colorscheme=light&show_faces=false&send=false&extended_social_context=false"></iframe>
			</div>
			<div class="social-btn">
				<a class="twitter-share-button" href="https://twitter.com/intent/tweet"></a>
				<script>
					window.twttr = (function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0],
					    t = window.twttr || {};
					  if (d.getElementById(id)) return t;
					  js = d.createElement(s);
					  js.id = id;
					  js.src = "https://platform.twitter.com/widgets.js";
					  fjs.parentNode.insertBefore(js, fjs);

					  t._e = [];
					  t.ready = function(f) {
					    t._e.push(f);
					  };

					  return t;
					}(document, "script", "twitter-wjs"));
				</script>
			</div>
			<div class="social-btn">
				<div class="g-plusone" data-size="medium" data-href="<?php echo $socialURL;?>"></div>
				<script type='text/javascript'>(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>
			</div>
		</div>
		<div class="hide-on-med-and-down right-align col l4" id="site-byline">
			My Coding Experiments
		</div>
	</div>
	<div class="nav-content">
		<div class="row">
			<div class="col s12 m12 l2 green center">
				<?php
				if( isset($GLOBALS['curDemo']) ){
					echo '<a href="'. $GLOBALS['curDemo']['url'] .'">See Tutorial</a>';
				}else{
					echo '<a href="//subinsb.com">Blog</a>';
				}
				?>
			</div>
			<?php
			if( isset($GLOBALS['curDemo']) ){
			?>
				<div class="col s12 m12 l8 site-face-color center" id="demo-title">
					<a href="<?php echo $GLOBALS['curDemo']['demo'];?>">
					<?php
					echo $GLOBALS['curDemo']['title'];
					?>

					</a>
				</div>
			<?php
			}else{
			?>
				<div class="col s12 m12 l8 purple center">
					<span>
						<?php
						if(mt_rand() % 2 === 0){
							$sth = $dbh->query("SELECT * FROM `downloads`")->fetchAll();
							$randomKey = array_rand($sth, 1);
							$randomDemo = $GLOBALS['demoList'][$sth[$randomKey]["id"]];
							echo "<a href='". $randomDemo["demo"] ."'>\"" . $randomDemo["title"] . "\" was downloaded {$sth[$randomKey]["counter"]} times</a>";
						} else {
							$randomKey = array_rand($GLOBALS['demoList'], 1);
							$randomDemo = $GLOBALS['demoList'][$randomKey];
							echo "A Random Experiment : <a href='". $randomDemo["demo"] ."'>" . $randomDemo["title"] . "</a>";
						}
						?>
					</span>
				</div>
			<?php
			}
			?>
			<div class="col s2 m2 l2 red hide-on-med-and-down center">
				<a href="//subinsb.com/donate">Donate</a>
			</div>
		</div>
	</div>
		<?php /* if($_SERVER["SERVER_NAME"]!='demos.sim'){ ?>
			<div style="position: absolute;right: 10px;top: 0px;min-height:60px;">
				<div style="vertical-align: middle;display: table-cell;">
					<SCRIPT SRC="//go.adversal.com/ttj?id=1814483&size=468x60&promo_sizes=320x50,300x50,216x36&promo_alignment=center" TYPE="text/javascript"></SCRIPT>
				</div>
			</div>
		<?php
			/*
			<script type="text/javascript" language="javascript">
			adlsi9 = "418bc39d5858a0c937a32dd62e84c30979|97279|9710";
			adlsi8 = "plixp9";
			</script>
			<script src="//www.adversalservers.com/publisherJS.js?i=plixp9"></script><script type="text/javascript" language="javascript">
				goAdversal("418bc39d5858a0c937a32dd62e84c309", 2, 10);
			</script>
			*/
		/*}*/
		/**
		<div class="right">
	    <ins data-revive-zoneid="1" data-revive-id="2a97f2e1048d9e7638b551730627dc14"></ins>
	    <script async src="https://sky-phpgeek.rhcloud.com/opa/www/d/simrin.php"></script>
	  </div>
		 */
		?>

</nav>
