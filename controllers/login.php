<?php

require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/password.php';
require_once __DIR__ . '/../functions.php';
require_once __DIR__ . '/../config.php';

if (isset($_SESSION['me'])) {
	header('Location: ' . SITE_URL);
	exit;
}

if (User::findByEmail($_POST['email'])->password == Password::hashPassword($_POST['password'])) {
	$_SESSION['me'] = $_POST['email'];
	header('Location: ' . SITE_URL);
	exit;
} else {
	$smarty = getSmartyInstance();
	$smarty->display('login.tpl');
}
