<?php

require_once('config.php');
require_once('functions.php');

session_start();

if (!empty($_SESSION['me'])) {
	header('Location: '.SITE_URL);
	exit();
}

function getUser($email, $password, $dbh) {
	$sql = "select * from users where email = :email and password = :password limit 1";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array("email"=>$email,"password"=>getSha1Password($password)));
	$user = $stmt->fetch();
	return $user ? $user : false;
}

if ($_SERVER['REQUEST_METHOD']!='POST') {
	//CSRF対策
	setToken();
} else {
	checkToken();
	$email = $_POST['email'];
	$password = $_POST['password'];
	$dbh = connectDb();
	$err = array();

	//メールアドレスが登録されていない
	if (!emailExists($email,$dbh)) {
		$err['email'] = 'このメールアドレスは登録されていません';
	}

	//メールアドレスの形式が不正
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$err['email'] = 'メールアドレスの形式が正しくないです。';
	}
		
	//メールアドレスが空？
	if ($email=='') {
		$err['email'] = 'メールアドレスを入力してください';
	}

	//メールアドレスとパスワードが正しくない
	if(!$me = getUser($email, $password, $dbh)) {
		$err['password'] = 'パスワードとメールアドレスが正しくありません';
	}

	//パスワードが空？
	if ($password=='') {
		$err['password'] = 'パスワードを入力してください';
	}
	
	if (empty($err)) {
		//セッションハイジャック対策
		session_regenerate_id(true);
		$_SESSION['me'] = $me;
		header('Location: '.SITE_URL.'/test');
		exit;
	}
}
?><!DOCTYPE html>
<html lang="ja">
<head>
	<title>ログイン┃Tea-tango</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="eitango.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script language="javascript" src="eitango_header.js"></script>
</head>
<body>
<script>header();</script>
<div class="main">
	<h2>ログイン</h2>
	<form action="" method="POST">
	<p>メールアドレス：<input type="text" name="email" value="<?php echo h($email); ?>"> <?php echo h($err['email']); ?></p>
	<p>パスワード：<input type="password" name="password" value=""> <?php echo h($err['password']); ?></p>
	<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>"
	<p><input type="submit" value="ログイン">　<a href="signup.php">新規登録はこちら！</a></p>
	</form>
	<p>バグ等を発見した場合はTwitter <a href="http://twitter.com/0918nobita" style="text-decoration:none;">@0918nobita</a> までご連絡ください。</p>
</div>
</body>
</html>