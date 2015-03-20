<?php 
$_SESSION['languagePackEn'] = array(
	'マイ単語帳'=>'My wordcard',
	'単語帳追加'=>'Add wordcard',
	'問題追加'=>'Add question',
	'成績'=>'Performance',
	'お知らせ'=>'Notice',
	'ヘルプ'=>'Help',
	'新規登録'=>'Create account',
	'新規ユーザー登録'=>'Create account',
	'新規登録はこちら！'=>'Create account',
	'ログイン'=>'Login',
	'ログアウト'=>'Logout',
	'お名前を入力してください'=>'Please input your name.',
	'メールアドレスの形式が正しくありません'=>'Invalid e-mail address format.',
	'このメールアドレスは既に登録されています'=>'This e-mail address is already registered.',
	'メールアドレスを入力してください'=>'Please input your e-mail address.',
	'パスワードを入力してください'=>'Please input your password.',
	'メールアドレス'=>'Your e-mail',
	'お名前'=>'Your name',
	'パスワード'=>'Password',
	'パスワードを入力'=>'Create a password',
	'戻る'=>'Back',
	'新規登録！'=>'Create account'

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