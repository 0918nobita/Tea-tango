<?php
session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../libs/Smarty.class.php';
require_once __DIR__ .'/header.php';

//login.phpに直接アクセスしている場合は書換
if(strpos($_SERVER["REQUEST_URI"],"login.php") !== false && isset($_GET['page'])) {
	header("Location: ".SITE_URL."login");
	exit();
}

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
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$dbh = connectDb();
	$err = array();
	//メールアドレスが空？
	if (empty($email)) {
		$err['email'] = "メールアドレスを入力してください";
	}
	//メールアドレスとパスワードが正しくない
	if (!$me = getUser($email, $password, $dbh)) {
		$err['password'] = "メールアドレスとパスワードが正しくありません";
	}
	//パスワードが空？
	if ($password == "") {
		$err['password'] = "パスワードを入力してください";
	}
	if (empty($err)) {
		//セッションハイジャック対策
		session_regenerate_id(true);
		$_SESSION['me'] = $me;
		header("Location: timeline");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf8">
<link rel="stylesheet" href="<?php echo SITE_URL . "src/views/style.css"; ?>">
<title>Tea-tango / ログイン</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="titleBar">
	ログイン
</div>
<div id="main">
	<form action="" method="POST">
		<p>メールアドレス：<input type="text" name="email" value="<?php echo h($email)?>">
		<?php echo h($err['email']); ?></p>
		<p>パスワード：<input type="password" name="password" value="">
		<?php echo h($err['password']); ?></p>
		<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
		<p><input type="submit" value="ログイン">　<a href="signup">新規登録はこちら！</a></p>
	</form>
</div>
</body>
</html>
