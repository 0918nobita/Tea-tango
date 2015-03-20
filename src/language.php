<?php 
$_SESSION['languagePackEn'] = array(
	'マイ単語帳'=>'My wordcard',
	'単語帳追加'=>'Add wordcard',
	'問題追加'=>'Add question',
	'成績'=>'Performance',
	'お知らせ'=>'Notice',
	'ヘルプ'=>'Help',
	'ログアウト'=>'Logout'
	);
function lang($a,$b) {
	if ($b=='en') {
		if (!isset($_SESSION['languagePackEn'][$a])) {
			return $a;
		} else {
			return $_SESSION['languagePackEn'][$a]; 
		}
	} else {
		return $a;
	}
}