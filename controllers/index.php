<?php

require_once __DIR__ . '/../other.php';

$smarty = getSmartyInstance();
$smarty->assign('me', User::findById($_SESSION['me']));
$smarty->display('index.tpl');
