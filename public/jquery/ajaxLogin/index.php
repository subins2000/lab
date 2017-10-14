<?php
require_once __DIR__ . '/../../../inc/load.php';
init(29);
?>
<!DOCTYPE html>
<html>
 	<head>
  		<?php head();?>
  		<script src="<?php echo $siteURL;?>/assets/jquery.min.js"></script> <!-- //code.jquery.com/jquery-1.9.0.min.js -->
  		<script src="form.js"></script>
  		<link href="form.css" rel="stylesheet" />
 	</head>
 	<body>
  		<?php top();?>
  		<div class="container" id="content">
			<div class="loginForm">
				<label>
					<span>Username</span>
					<input type="text" name="username" />
				</label>
				<label>
					<span>Password</span>
					<input type="password" name="password" />
				</label>
				<div class="submit">Log In</div>
				<div class="overlay">
					<div class="message processing">
						<h2>Logging In</h2>
					</div>
					<div class="message error">
						<h2>Incorrect Credentials</h2>
						<p>The username or password you entered was not correct</p>
					</div>
					<div class="message success">
						<h2>Logged In</h2>
						<p>You have been logged in</p>
					</div>
				</div>
			</div>
			<p>
				Username : subin <br/>
				Password : blog
			</p>
  		</div>
  		<?php footer();?>
 	</body>
</html>