<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Support Kerala Blasters | Make Blasters Profile Picture | Upload To Facebook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/croppie.css" rel="stylesheet" async="async" />
    <link href="css/style.css" rel="stylesheet" async="async" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="js/croppie.min.js" async="async"></script>
    <script src="js/app.js" async="async"></script>
    <script src="js/fb.js" async="async"></script>
    <meta property="og:title" content="Support Kerala Blasters!" />
    <meta property="og:url" content="http://demos.subinsb.com/isl-profile-pic/" />
    <meta property="og:image" content="http://demos.subinsb.com/isl-profile-pic/image/og-logo.png" />

    <meta name="description" content="Support Kerala Blasters by changing your profile picture. You can directly upload 
    it to Facebook or download the image." />
    <meta property="og:description" content="Support Kerala Blasters by changing your profile picture. You can directly upload it to Facebook or download the image." />

    <meta property="fb:app_id" content="1046604178789662" />
  </head>
  <body>
  	<div id="wrapper">
    	<div class="container" id="content">
    		<h1><a href="https://demos.sim/isl-profile-pic/">Support Kerala Blasters!</a></h1>
    		<p>Support Kerala Blasters by changing your profile picture</p>
    		<div id="preview">
          <div id="crop-area">
    			  <img src="image/person.png" id="profile-pic" />
          </div>
    			<img src="image/dp-fg.png" id="fg" data-design="" />
    		</div>
        <p>
          <button id="download" disabled>Download Profile Picture</button>
          <button id="fb-set-pic" disabled>Set As <b>Facebook</b> Profile Picture</button>
        </p>
        <h2>Upload</h2>
        <input type="file" name="file" onchange="onFileChange(this)">
        <h2>OR</h2>
        <div class="fb-login-button" data-scope="public_profile,publish_actions" onlogin="checkLoginState();" data-max-rows="5" data-size="large" data-show-faces="false" data-auto-logout-link="false"></div>
        <div id="status"></div>
        <h2>Design</h2>
        <div id="designs">
          <img class="design active" src="image/dp-fg.png" data-design="" />
          <img class="design" src="image/dp-fg-1.png" data-design="1" />
          <img class="design" src="image/dp-fg-2.png" data-design="2" />
        </div>
        <?php
        require "footer.php"
        ?>
    	</div>
    </div>
  </body>
</html>
