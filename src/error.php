<?php
session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../libs/Smarty.class.php';
require_once __DIR__ .'/header.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Tea-tango / 404 Not Found</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="stylesheet" href="<?php echo SITE_URL . "src/views/style.css"; ?>">
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="titleBar">
	404 Not Found
</div>
<div id="main">
	<p>ページが見つかりませんでした</p>
	<p><a href="<?php echo SITE_URL . "timeline"; ?>">トップページに戻る</a></p>
</div>
</body>
</html>