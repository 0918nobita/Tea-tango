<?php

require_once('config.php');
require_once('functions.php');

session_start();

if (empty($_SESSION['me'])) {
	header('Location: login.php');
	exit();
}

$me = $_SESSION['me'];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<title>Tea-tango</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" type="text/css" href="eitango.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script language="javascript" src="eitango_header.js"></script>
</head>
<body>
<script>header();</script>
<div class="main">
<p>Logged in as <?php echo h($me['name']); ?> <a href="logout.php">[ログアウト]</a></p>
<h2>単語帳一覧</h2>
<p class="card"><a href="c2.php" style="text-decoration:none;">ユメタン561～590</a></p>
<p class="card"><a href="c1.php" style="text-decoration:none;">ユメタン711～740</a></p>
<p><a href="cardadd.php">単語帳の新規作成</a></p>
<p>バグ等を発見した場合はTwitter <a href="http://twitter.com/0918nobita" style="text-decoration:none;">@0918nobita</a> までご連絡ください。</p>
</div>
<a href="" style="text-decoration:none;">
<div class="upload_footer">
	<p>単語帳を投稿する</p>
</div>
</a>
</body>
</html>