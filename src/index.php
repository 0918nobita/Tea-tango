<?php
session_start();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->template_dir = dirname( __FILE__ ).'/views';
$smarty->compile_dir  = dirname( __FILE__ ).'/templates_c';

if (isset($_SESSION['me'])) {
	$smarty->assign("login", "true");
	$smarty->assign("myName", $_SESSION['me']['name']);
} else {
	$smarty->assign("login", "false");
}

$smarty->assign("site_url", SITE_URL);
$smarty->assign("myName", $_SESSION['me']['name']);

switch ($_SESSION['lang']) {
	case "en":
		$smarty->assign("configFile", "../models/translate/en.conf");
		break;
	case "ja":
		$smarty->assign("configFile", "../models/translate/ja.conf");
		break;
	default:
		$smarty->assign("configFile", "../models/translate/ja.conf");
		break;
}

//index.phpに直接アクセスしている場合は書換
if(strpos($_SERVER["REQUEST_URI"],"index.php") !== false && isset($_GET['page'])) {
	header("Location: ".SITE_URL.$_GET['page']);
	exit();
}

$dbh = connectDb();

switch ($_GET['page']) {

	//概要
	case "about":
		$smarty->display("about.tpl");
		break;
	
	//マイライブラリ
	case "library":
		loginCheck("login");
		$smarty->display("library.tpl");
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
			header("Location: ".SITE_URL."timeline");
			exit;
		}
		$smarty->assign("name", $_GET['name']);
		$smarty->assign("screen_name",getScreenNameByName($_GET['name'], $dbh));
		$smarty->assign("profile",preg_replace('/(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)/', '<a href="\\1\\2" target="_blank">\\1\\2</a>', h(getProfileByName($_GET['name'], $dbh))));
		$stmt = $dbh->prepare("select * from cards where author=:name order by id desc limit 0, 20");
		$stmt->execute(array(":name" => $_GET['name']));
		$result = $stmt->fetchAll();
		$smarty->assign("card_list", $result);
		$smarty->display("profile.tpl");
		break;
	
	//その他
	case "others":
		loginCheck("login");
		$smarty->display("others.tpl");
		break;

	default:
		loginCheck("about");
		header("Location: timeline");
		break;
}

require_once __DIR__ . '/footer.php';

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo SITE_URL . "src/views/style.css"; ?>">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
<?php include_once(SITE_URL . "src/analyticstracking.php") ?>
<div id="main">
</div>
</body>
</html>