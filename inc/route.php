<?php
require_once __DIR__ . "/route.php";
require_once __DIR__ . '/vendor/autoload.php';

$klein = new \Klein\Klein();

$klein->respond('GET', '/download/[s:downloadID]', function ($request) {
	
});

$klein->respond('404', function ($request) {
		$page = $request->uri();
		?>
		<h1>404</h1>
		<p>It looks like <?php echo $page ?> doesn't exist.</p>
    <p>
    	<a href="/">Go Home</a>
    	<a href="http://subinsb.com">Go to main site</a>
    </p>
		<?php
});

$klein->dispatch();