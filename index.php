<?php
session_start();

require_once(dirname(__FILE__).'/config.php');
require_once(dirname(__FILE__).'/functions.php');
require_once(dirname(__FILE__).'/libs/Smarty.class.php' );
require_once(dirname(__FILE__).'/header.php');

$dbh = connectDb();

$smarty = new Smarty();
$smarty->template_dir = dirname( __FILE__ ).'/templetes';
$smarty->compile_dir  = dirname( __FILE__ ).'/templetes_c';

switch ($_GET['page']) {
	//マイライブラリ
	case "my_library":
		$smarty->display("my_library.tpl");
		if (empty($_SESSION['me'])) {
			header("Location: login.php");
			exit;
		}
		break;
	//単語カード
	case "card":
		$stmt = $dbh->prepare("select * from cards order by id desc limit 0, 20");
		$stmt->execute();
		$result = $stmt->fetchAll();
		$smarty->assign("card_list", $result);
		$smarty->display("card.tpl");
		break;
	//ヘルプ
	case "help":
		$smarty->display("help.tpl");
		break;
	//プロフィール
	case "profile":
		if (empty($_GET['name'])) {
			header("Location: index.php?page=card");
			exit;
		}
		if (!getUserByName($_GET['name'], $dbh)) {
			header("Location: index.php?page=card");
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
			header("Location: login.php");
			exit;
		}
		$smarty->assign("name", $_SESSION['me']['name']);
		$smarty->assign("screen_name",getScreenNameByName($_SESSION['me']['name'], $dbh));
		$smarty->assign("profile",h(getProfileByName($_SESSION['me']['name'], $dbh)));
		$smarty->display("profile_edit.tpl");
		break;
	case "others":
		$smarty->display("others.tpl");
		break;
	//その他
	default:
		if (empty($_SESSION['me'])) {
			header("Location: ".SITE_URL."about.php");
		} else {
			header("Location: ".SITE_URL."index.php?page=card");
		}
		break;
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="main">
</div>
</body>
</html>