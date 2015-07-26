<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<div id="header">Tea-tango</div>
<div id="headerMenu">
	<?php
	if (!empty($_SESSION['me'])) {
		echo "<a href='index.php?page=my_library'><p class='headerMenuButton'><!-- マイライブラリ --><i class='fa fa-star'></i><br />ﾗｲﾌﾞﾗﾘ</p></a>";
		echo "<a href='index.php?page=card'><p class='headerMenuButton'><!-- 単語カード --><i class='fa fa-home'></i><br />ﾀｲﾑﾗｲﾝ</p></a>";
		echo "<a href='index.php?page=profile&name=".$_SESSION['me']['name']."'><p class='headerMenuButton'><i class='fa fa-user'></i><br />ﾌﾟﾛﾌｨｰﾙ</p></a>";
		echo "<a href='index.php?page=others'><p class='headerMenuButton'><!-- ヘルプ --><i class='fa fa-cog'></i><br />その他</p></a>";
	} else {
		echo "<a href='signup.php'><p class='headerMenuButton'><!-- 単語カード --><i class='fa fa-sign-in'></i><br />新規登録</p></a>";
		echo "<a href='index.php?page=card'><p class='headerMenuButton'><!-- 単語カード --><i class='fa fa-home'></i><br />ﾀｲﾑﾗｲﾝ</p></a>";
		echo "<a href='about.php'><p class='headerMenuButton'><i class='fa fa-info'></i><br />概要</p></a>";
		echo "<a href='index.php?page=help'><p class='headerMenuButton'><!-- ヘルプ --><i class='fa fa-question'></i><br />ﾍﾙﾌﾟ</p></a>";
	}
	?>
</div>
</body>
</html>