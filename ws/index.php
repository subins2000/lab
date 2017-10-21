<?php
require_once __DIR__ . "/config.php";

if(!isRunning()){
  /**
   * The WebSocket server is not started. So we, start it
   */
  exec("nohup php -q '$docRoot/run.php' > /dev/null 2>&1 &");
}
?>
<!DOCTYPE html>
<html>
 	<head></head>
 	<body>
		<h1>Done and Done</h1>
    <a href="http://subinsb.com">subinsb.com</a>
 	</body>
</html>
<?php
/**
 * Kill Apache
 */
exec("kill $(ps aux | grep 'httpd' | awk '{print $2}')");
?>
