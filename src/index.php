<?php
session_start();

require_once(dirname(__FILE__).'/config.php');
require_once(dirname(__FILE__).'/functions.php');
require_once('../libs/Smarty.class.php' );
require_once(dirname(__FILE__).'/header.php');

//index.phpに直接アクセスしている場合は書換
if(strpos($_SERVER["REQUEST_URI"],"index.php") !== false && isset($_GET['page'])) {
	header("Location: ".SITE_URL.$_GET['page']);
	exit();
}

$dbh = connectDb();

$smarty = new Smarty();
$smarty->template_dir = dirname( __FILE__ ).'/views';
$smarty->compile_dir  = dirname( __FILE__ ).'/templates_c';

switch ($_GET['page']) {
	//概要
	case "about":
		$smarty->display("about.tpl");
		break;
	//マイライブラリ
	case "library":
		$smarty->display("library.tpl");
		if (empty($_SESSION['me'])) {
			header("Location: login");
			exit;
		}
		break;
	//タイムライン
	case "timeline":
		$stmt = $dbh->prepare("select * from cards order by id desc limit 0, 20");
		$stmt->execute();
		$result = $stmt->fetchAll();
		$smarty->assign("card_list", $result);
		$smarty->display("timeline.tpl");
		break;
	//ヘルプ
	case "help":
		$smarty->display("help.tpl");
		break;
	//プロフィール
	case "profile":
		if (empty($_GET['name'])) {
			header("Location: timeline");
			exit;
		}
		if (!getUserByName($_GET['name'], $dbh)) {
			header("Location: timeline");
			exit;
		}
		$smarty->assign("myName", $_SESSION['me']['name']);
		$smarty->assign("name", $_GET['name']);
		$smarty->assign("screen_name",getScreenNameByName($_GET['name'], $dbh));
		$smarty->assign("profile",h(getProfileByName($_GET['name'], $dbh)));
		$smarty->display("profile.tpl");
		break;
	case "profile_edit":
		if (empty($_SESSION['me'])) {
			header("Location: login");
			exit;
		} else {
			header("Location: profile_edit.php");
		}
		break;
	case "others":
		$smarty->display("others.tpl");
		break;
	//その他
	default:
		if (empty($_SESSION['me'])) {
			header("Location: about");
		} else {
			header("Location: timeline");
		}
		break;
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/src/views/style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="main">
</div>
</body>
</html>