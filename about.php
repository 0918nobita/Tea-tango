<?php
session_start();
require_once(dirname(__FILE__).'/config.php');
require_once(dirname(__FILE__).'/functions.php');
require_once(dirname(__FILE__).'/header.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>効率的に暗記するならTea-tango！/Tea-tangoとは</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="titleBar">Tea-tangoをはじめよう</div>
<div id="main">
	<?php
	if (empty($_SESSION["me"])) {
		echo "<p>アカウントをお持ちの方は<a href='./login.php'>ログイン</a></p>";
	}
	?>
	<h2>デジタル単語帳を、共有しよう</h2>
	<p>簡単に単語帳/単語カードを作成することができます。それをタイムラインで公開して、みんなに使ってもらえます。</p>
	<h2>他のユーザーが作った<br />単語帳/単語カードを<br />「マイライブラリ」に追加しよう</h2>
	<p>他のユーザーが作成した単語帳/単語カードを、自分の単語帳の置き場所「マイライブラリ」に追加して、使いたいときにすぐ表示できるようにできます。</p>
	<h2>閲覧だけなら、会員登録は必要ありません</h2>
	<p></p>
	<div id="letsstartButton"><a href="index.php?page=card" style="text-decoration: none;">さぁ、はじめよう</a></div>
</div>
</body>
</html>