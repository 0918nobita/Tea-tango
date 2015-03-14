<?php

require_once __DIR__ . '/dispatcher.php';

if (!Dispatcher::get('/login', __DIR__ . '/controllers/login') && 
	!Dispatcher::post('/login', __DIR__ . '/controllers/login')) {
	header('HTTP/1.0 404 Not Found');
	exit;
}
