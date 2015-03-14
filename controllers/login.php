<?php

require_once __DIR__ . '/../models/user.php';

require_once __DIR__ . '/../config.php';

if (isset($_SESSION['me'])) {
	header('Location: ' . SITE_URL);
	exit;
}

if ($user = User::findByEmail($_POST['email']) == null) {
	header('HTTP/1.0 404 Not Found');
	exit;
}
