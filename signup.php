<?php

require_once('config.php');
require_once('functions.php');

session_start();

if ($_SERVER['REQUEST_METHOD']!='POST') {
	//CSRF対策
	setToken();
} else {
	checkToken();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$dbh = connectDb();
	$err = array();
	//名前が空？
	if ($name=='') {
		$err['name'] = 'お名前を入力してください';
	}
	//メールアドレスが正しい？
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$err['email'] = 'メールアドレスの形式が正しくないです。';
	}
	if (emailExists($email,$dbh)) {
		$err['email'] = 'このメールアドレスは既に登録されています。';
	}
	//メールアドレスが空？
	if ($email=='') {
		$err['email'] = 'メールアドレスを入力してください';
	}
	//パスワードが空？
	if ($password=='') {
		$err['password'] = 'パスワードを入力してください';
	}

	if (empty($err)) {
		//登録処理
		$sql = "insert into users
				(name, email, password, created, modified)
				values
				(:name, :email, :password, now(), now())";
		$stmt = $dbh->prepare($sql);
		$params = array(
			":name" => $name,
			":email" => $email,
			":password" => getSha1Password($password)
		);
		$stmt->execute($params);
		header('Location:login.php');
	}
}

?><!DOCTYPE html>
<html lang="ja">
<head>
	<title>新規ユーザー登録┃Tea-tango</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="eitango.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script language="javascript" src="eitango_header.js"></script>
</head>
<body>
<script>header();</script>
<div class="main">
	<h2>新規ユーザー登録</h2>
	<form action="" method="POST">
		<p>お名前：<input type="text" name="name" value="">　<?php echo h($err['name']); ?></p>
		<p>メールアドレス：<input type="text" name="email" value=""> <?php echo h($err['email']); ?></p>
		<p>パスワード：<input type="password" name="password" value="">　<?php echo h($err['password']); ?></p>
		<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>" />
		<p><input type="submit" value="新規登録！">　<a href="index.php">戻る</a></p>
	</form>
	<p>バグ等を発見した場合はTwitter <a href="http://twitter.com/0918nobita" style="text-decoration:none;">@0918nobita</a> までご連絡ください。</p>
</div>
</body>
</html>