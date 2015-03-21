<?php
session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
if ($_GET['lang'] == 'en') {
	$_SESSION['lang'] = 'en';
} else {
	$_SESSION['lang'] = 'ja';
}
require_once __DIR__ . '/language.php';
require_once __DIR__ . '/header.php';
$dbh = connectDb();
if (empty($_SESSION['me'])) {
	header('Location: login.php?lang=' . $_SESSION['lang']);
	exit;
}
$me = $_SESSION['me'];
require_once dirname(__FILE__) . '/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->template_dir = __DIR__ . '/templates';
$smarty->compile_dir = __DIR__ . '/templates_c';
$smarty->cache_dir = __DIR__ . '/cache';
$smarty->assign('lang', $_SESSION['lang']);
//タイムライン
if ($_GET['p'] == 'timeline') {
}
//プロフィール
if ($_GET['p'] == 'profile') {
	try{
		$stmt = $dbh->query('select * from wordcards where author_id='.$_GET['id'].' order by id desc');
		$my_wordcards = array();
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$my_wordcards[] = $data;
		}
	} catch(PDOException $e) {
		echo '接続に失敗しました。';
		exit;
	}
	if ($_GET['id'] == '') {
		$smarty->assign('error_number', '00001');
		$smarty->assign('error_description', lang('ユーザー情報を読み込むことができませんでした。', $_SESSION['lang']));
		$smarty->display('error.tpl');
		exit;
	} else {
		$user = array();
		$user = userInfo($_GET['id']);
		$smarty->assign('my_name', $user['name']);
		$smarty->assign('my_introduce', $user['introduce']);
		$smarty->assign('my_wordcards', $my_wordcards);
		$smarty->display('profile.tpl');
	}
}
//プロフィール編集
if ($_GET['p'] == 'profile_edit') {

}
//単語帳詳細
if ($_GET['p'] == 'wordcard') {

}
//単語帳追加
if ($_GET['p'] == 'wordcard_add') {

}
//単語帳編集
if ($_GET['p'] == 'wordcard_edit') {

}
//問題追加
if ($_GET['p'] == 'card_add') {

}
//問題編集
if ($_GET['p'] == 'card_edit') {

}
//お知らせ
if ($_GET['p'] == 'notice') {
	try {
		$stmt = $dbh->query('select * from notice order by id desc');
		$notices = array();
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$notices[] = $data;
		}
	} catch (PDOException $e) {
		echo '接続に失敗しました。';
		exit;
	}
	$smarty->assign('notices', $notices);
	$smarty->display('notice.tpl');
}
if ($_GET['p'] == 'my_wordcard') {

}
if ($_GET['p'] == 'performance') {

}
if ($_GET['p'] == 'wordcard_seach') {

}
if ($_GET['p'] == 'card_seach') {

}
if ($_GET['p'] == 'user_seach') {

}
if ($_GET['p'] == 'help') {

}
if ($_GET['p'] == 'about') {

}
