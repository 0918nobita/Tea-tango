<?php

require_once __DIR__ . '/../other.php';

if (!isset($_SESSION['me'])) {
	header('Location: ' . SITE_URL . '/login');
	exit;
}

$smarty = getSmartyInstance();
$smarty->assign('me', User::findById($_SESSION['me']));
$smarty->display('index.tpl');
