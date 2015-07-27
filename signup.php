<?php
session_start();
require_once(dirname(__FILE__).'/config.php');
require_once(dirname(__FILE__).'/functions.php');
require_once(dirname(__FILE__).'/libs/Smarty.class.php' );
require_once(dirname(__FILE__).'/header.php');

function setToken() {
	$token = sha1(uniqid(mt_rand(), true));
	$_SESSION['token'] = $token;
}

function checkToken() {
	if (empty($_SESSION['token']) || ($_SESSION['token'] != $_POST['token'])) {
		echo "不正なPOSTが行われました。";
		exit;
	}
}

function emailExists($email, $dbh) {
	$sql = "select * from users where email = :email limit 1";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":email" => $email));
	$user = $stmt->fetch();
	return $user ? true : false;
}

function getSha1Password($s) {
	return sha1(PASSWORD_KEY.$s);
}

if (!empty($_SESSION['me'])) {
	header("Location: ".SITE_URL);
	exit;
}

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	//CSRF対策
	setToken();
} else {
	checkToken();
	$screen_name = $_POST['screen_name'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$dbh = connectDb();
	$err = array();
	//スクリーンネームが空？
	if ($screen_name == "") {
		$err['screen_name'] = "スクリーンネームを入力してください";
	}
	//ユーザーネームが空？
	if ($name == "") {
		$err['name'] = "ユーザーネームを入力してください";
	}
	//メールアドレスが正しい？
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$err['email'] = "メールアドレスの形式が正しくないです";
	}
	if (emailExists($mail, $dbh)) {
		$err['email'] = "このメールアドレスは既に登録されています";
	}
	//メールアドレスが空？
	if (empty($email)) {
		$err['email'] = "メールアドレスを入力してください";
	}
	//パスワードが空？
	if ($password == "") {
		$err['password'] = "パスワードを入力してください";
	}
	//パスワードが確認フォームのパスワードと一致しない？
	if ($password != $password2) {
		$err['password2'] = "一致しません";
	}
	if (empty($err)) {
		//登録処理
		$sql = "insert into users(name, screen_name, email, password)
				values(:name, :screen_name, :email, :password);";
		$stmt = $dbh->prepare($sql);
		$params = array(
			":name" => $name,
			":screen_name" => $screen_name,
			":email" => $email,
			":password" => getSha1Password($password)
			);
		$stmt->execute($params);
		header("Location: login.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf8">
<link rel="stylesheet" href="style.css">
<title>効率的に暗記するならTea-tango！/新規ユーザー登録</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="titleBar">
	新規ユーザー登録
</div>
<div id="main">
	<form action="" method="POST">
		<p>スクリーンネーム(後から変更できます)：<input type="text" name="screen_name" value="<?php echo h($screen_name); ?>"> <?php echo h($err['screen_name']); ?></p>
		<p>ユーザーネーム(登録後の変更はできません)：<input type="text" name="name" value="<?php echo h($name); ?>"> <?php echo h($err['name']); ?></p>
		<p>メールアドレス：<input type="text" name="email" value="<?php echo h($email); ?>"> <?php echo h($err['email']); ?></p>
		<p>パスワード：<input type="password" name="password" value=""> <?php echo h($err['password']); ?></p>
		<p>パスワード(再度入力)：<input type="password" name="password2" value=""> <?php echo h($err['password2']); ?></p>
		<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
		<p><input type="submit" value="新規登録">　<a href="login.php">戻る</a></p>
	</form>
</div>
</body>
</html>