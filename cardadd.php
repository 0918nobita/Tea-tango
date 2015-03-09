<?php

require_once('config.php');
require_once('functions.php');

session_start();

$me = $_SESSION['me'];

if ($_SERVER['REQUEST_METHOD']!='POST') {
	//CSRF対策
	setToken();
} else {
	checkToken();
	$card_title = $_POST['card_title'];
	$card_category = $_POST['category'];
	$dbh = connectDb();
	$err = array();

	if ($card_title=='') {
		$err['card_title'] = 'カードのタイトルが入力されていません';
	}

	if ($category=='') {
		$err['category'] = 'カテゴリが設定されていません';
	}
	if ($category=='none') {
		$err['category'] = 'カテゴリが設定されていません';
	}
	if (empty($err)) {
		//登録処理
		$sql = "insert into cards
				(title, author_id, category, created, modified)
				values
				(:title, :author_id, :category, now(), now())";
		$stmt = $dbh->prepare($sql);
		$params = array(
			":title" => $card_title,
			":author_id" => h($me['name']),
			":category" => $category,
		);
		$stmt->execute($params);
		header('Location:index.php');
	}
}
?><!DOCTYPE html>
<html lang="ja">
<head>
<title>単語帳の新規作成┃Tea-tango</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" type="text/css" href="eitango.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script language="javascript" src="eitango_header.js"></script>
</head>
<body>
<script>header();</script>
<div class="main">
<h2>単語帳の新規作成</h2>
<p>覚えたい事項を書き込んで、みんなで覚えましょう！</p>
<p><a href="cardadd_cyui.php">注意(必ず読んでください)</a></p>
<form action="" method="POST">
<p>単語帳のタイトル(必須)：<input type="text" name="card_title" value=""></p>
<?php echo $err['card_title']; ?>
<p>カテゴリ(必須)：</p>
<select name="category">
	<option value="none">選択してください</option>
	<option value="Arithmetic">算数</option>
	<option value="Mathematics">数学</option>
	<option value="Japanese">国語</option>
	<option value="Modernman">現代文</option>
	<option value="Classical">古典</option>
	<option value="Science">理科</option>
	<option value="Chemistry">化学</option>
	<option value="Physical">物理</option>
	<option value="Biological">生物</option>
	<option value="Socialstudies">社会</option>
	<option value="History">歴史</option>
	<option value="Citizen">公民</option>
	<option value="English">英語</option>
	<option value="Other">その他</option>
</select>
<?php echo $err['category']; ?>
<p>問題と解答：</p>
<?php
$a = 1;
while ($a < 51) {
	echo '<input type="text" name="'.$a.'_question" value="" placeholder="問題'.$a.'"> <input type="text" name="'.$a.'_answer" value="" placeholder="解答"><br />';
	$a++;
}
?>
<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
<p><input type="submit" value="新規作成"></p>
</form>
<p>バグ等を発見した場合はTwitter <a href="http://twitter.com/0918nobita" style="text-decoration:none;">@0918nobita</a> までご連絡ください。</p>
</div>
</body>
</html>