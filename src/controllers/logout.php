<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../functions.php';

session_start();

$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-86400, '/');
}

session_destroy();

header('Location: '.SITE_URL.'login');