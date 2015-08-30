<?php
session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../libs/Smarty.class.php' ;
require_once __DIR__ . '/header.php';

//change-language.phpに直接アクセスしている場合は書換
if(strpos($_SERVER["REQUEST_URI"],"change-language.php") !== false && isset($_GET['page'])) {
	header("Location: ".SITE_URL."change_language");
	exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	switch ($_POST['lang']) {
		case "ja":
			$_SESSION['lang'] = "ja";
			break;
		case "en":
			$_SESSION['lang'] = "en";
			break;
		default:
			$_SESSION['lang'] = "ja";
			break;
	}
	header("Location: " . SITE_URL . "others");
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf8">
<link rel="stylesheet" href="<?php echo SITE_URL . "src/views/style.css"; ?>">
<title>Tea-tango / Language</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="titleBar">
	Language
</div>
<div id="main">
	<form action="" method="POST">
		<select name="lang">
			<option value="ja"<?php if ($_SESSION['lang'] == "ja") echo "selected" ?>>Japanese</option>
			<option value="en"<?php if ($_SESSION['lang'] == "en") echo "selected" ?>>English</option>
		</select>
		<input type="submit" value="保存">
	</form>
</div>
</body>
</html>
