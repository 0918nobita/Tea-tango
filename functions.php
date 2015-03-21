<?php
require_once __DIR__ . '/libs/Smarty.class.php';

function &getSmartyInstance() {
	static $smarty;
	if (!isset($smarty)) {
		$smarty = new Smarty;
		$smarty->template_dir = __DIR__ . '/templates';
		$smarty->compile_dir = __DIR__ . '/templates_c';
	}
	return $smarty;
}
