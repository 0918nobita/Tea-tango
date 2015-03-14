<?php

require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/password.php';
require_once __DIR__ . '/../models/token.php';
require_once __DIR__ . '/../other.php';
require_once __DIR__ . '/../config.php';

if (Login::isLogin()) {
	header('Location: ' . SITE_URL);
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!Token::check($_POST['token'])) {
		header('HTTP/1.1 400 Bad Request');
		exit;
	} 
	$user = User::findByEmail($_POST['email'])
	if ($user->password == Password::hashPassword($_POST['password'])) {
		$_SESSION['me'] = $user->id;
		header('Location: ' . SITE_URL);
		exit;
	}
}

$smarty = getSmartyInstance();
$smarty->assign('token', Token::create());
$smarty->display('login.tpl');
