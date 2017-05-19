<?php
require_once __DIR__ . "/route.php";
require_once __DIR__ . '/vendor/autoload.php';

$klein = new \Klein\Klein();

$klein->respond('GET', '/download/[s:downloadID]', function ($request) {
	
});

$klein->respond('404', function ($request) {
	$page = $request->uri();
    require __DIR__ . '/views/404.php';
});

$klein->dispatch();
