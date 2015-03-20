<?php
session_start();
require_once('header.php');

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
		$err['name'] = lang('お名前を入力してください',$lang);
	}
	//メールアドレスが正しい？
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$err['email'] = lang('メールアドレスの形式が正しくありません',$lang);
	}
	if (emailExists($email,$dbh)) {
		$err['email'] = lang('このメールアドレスは既に登録されています',$lang);
	}
	//メールアドレスが空？
	if ($email=='') {
		$err['email'] = lang('メールアドレスを入力してください',$lang);
	}
	//パスワードが空？
	if ($password=='') {
		$err['password'] = lang('パスワードを入力してください',$lang);
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
		header('Location:login.php?lang='.$_SESSION['lang']);
	}
}

?><!DOCTYPE html>
<html lang="ja">
<head>
<title><?php echo lang('新規ユーザー登録',$_SESSION['lang']); ?>┃Tea-tango</title>
<meta charset="UTF-8">
</head>
<body>
<div id="main">
<div id="page-title">
<div id="page-title-text"><p><?php echo lang('新規ユーザー登録',$_SESSION['lang']);?></p></div>
</div>
<form action="" method="POST">
<p><?php echo lang('お名前',$_SESSION['lang']); ?>：<input type="text" name="name" value="">　<?php echo h($err['name']); ?></p>
<p><?php echo lang('メールアドレス',$_SESSION['lang']); ?>：<input type="text" name="email" value=""> <?php echo h($err['email']); ?></p>
<p><?php echo lang('パスワードを入力',$_SESSION['lang']); ?>：<input type="password" name="password" value="">　<?php echo h($err['password']); ?></p>
<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
<p><?php echo '<input type="submit" value="'.lang('新規登録！',$_SESSION['lang']).'">　<a href="login.php?lang='.$_SESSION['lang'].'">'.lang('ログイン',$_SESSION['lang']).'</a></p>';?>
</form>
<p><a href="signup.php?lang=ja">Japanese</a>　<a href="signup.php?lang=en">English</a></p>
<p>バグ等を発見した場合はTwitter <a href="http://twitter.com/0918nobita" style="text-decoration:none;">@0918nobita</a> までご連絡ください。</p>
</div>
</body>
</html>