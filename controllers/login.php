<?php

require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/password.php';
require_once __DIR__ . '/../models/token.php';
require_once __DIR__ . '/../other.php';
require_once __DIR__ . '/../config.php';

if (isset($_SESSION['me'])) {
	header('Location: ' . SITE_URL);
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!Token::check($_POST['token'])) {
		header('HTTP/1.1 400 Bad Request');
		exit;
	} 
	if (User::findByEmail($_POST['email'])->password == Password::hashPassword($_POST['password'])) {
		$_SESSION['me'] = $_POST['email'];
		header('Location: ' . SITE_URL);
		exit;
	}
}

$smarty = getSmartyInstance();
$smarty->assign('token', Token::create());
$smarty->display('login.tpl');
