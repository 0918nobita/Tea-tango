<?php
session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../libs/Smarty.class.php' ;
require_once __DIR__ . '/header.php';

//profile-edit.phpに直接アクセスしている場合は書換
if(strpos($_SERVER["REQUEST_URI"],"profile-edit.php") !== false && isset($_GET['page'])) {
	header("Location: ".SITE_URL."profile_edit");
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

if (empty($_SESSION['me'])) {
	header("Location: ".SITE_URL);
	exit;
}

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	//CSRF対策
	setToken();
} else {
	checkToken();
	$screen_name = $_POST['screen_name'];
	$profile = $_POST['profile'];
	$dbh = connectDb();
	$err = array();
	if (empty($screen_name)) {
		$err['screen_name'] = "名前を入力してください";
  }
	if (mb_strlen($screen_name) > 30) {
		$err['screen_name'] = "30文字以内にしてください";
	}
	if (mb_strlen($profile) > 140) {
		$err['profile'] = "140文字以内にしてください";
	}
	if (empty($err)) {
		//セッションハイジャック対策
		session_regenerate_id(true);
		//書き込み処理
		$dbh = connectDb();
		$sql = 'update users set screen_name = :screen_name, profile = :profile where id = :id';
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":screen_name", $screen_name, PDO::PARAM_STR);
		$stmt->bindParam(":profile", $profile, PDO::PARAM_STR);
		$stmt->bindValue(":id", $_SESSION['me']['id'], PDO::PARAM_INT);
		$stmt->execute();
		header("Location: profile/".$_SESSION['me']['name']);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf8">
<link rel="stylesheet" href="<?php echo SITE_URL . "src/views/style.css"; ?>">
<title>効率的に暗記するならTea-tango！/プロフィール編集</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<style>
textarea {
	resize: vertical;
}
</style>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="titleBar">
	プロフィール編集
</div>
<div id="main">
	<form action="" method="POST">
		<?php $dbh = connectDb(); ?>
		<p>名前：　<input type="text" name="screen_name" value="<?php echo getScreenNameByName($_SESSION['me']['name'], $dbh); ?>" /></p>
		<?php echo $err['screen_name']; ?>
		<p>自己紹介</p>
		<textarea name="profile" style="width:100%;height:200px"><?php echo h(getProfileByName($_SESSION['me']['name'], $dbh)); ?></textarea>
		<?php echo $err['profile']; ?><br />
		<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
		<input type="button" value="キャンセル" onClick="history.back();"> <input type="submit" value="保存">
		<?php $dbh = null; ?>
	</form>
</div>
</body>
</html>
