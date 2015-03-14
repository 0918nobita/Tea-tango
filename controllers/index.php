<?php

require_once __DIR__ . '/../models/login.php';
require_once __DIR__ . '/../other.php';

if (!Login::isLogin()) {
	header('Location: ' . dirname(SITE_URL) . '/login');
	exit;
}

$smarty = getSmartyInstance();
$smarty->assign('me', User::findById($_SESSION['me']));
$smarty->display('index.tpl');
