<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="0918nobita">
<meta name="description" content="単語帳を作っている時間がもったいない…コンパクトに持ち歩きたい…そんな悩みを解決する、デジタル単語帳共有Webサービスです！">
<meta property="og:type" content="website">
<meta property="og:title" content="Tea-tango">
<meta property="og:description" content="単語帳を作っている時間が省ける！デジタル単語帳共有Webサービス">
<meta property="og:locale" content="ja_JP">
<meta property="og:image" content="<?php echo SITE_URL."images/about.jpg"; ?>">
<!-- Twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@0918nobita" />
<meta name="twitter:title" content="Tea-tango">
<meta name="twitter:description" content="単語帳を作っている時間が省ける！デジタル単語帳共有Webサービス" />
<meta name="twitter:image" content="<?php echo SITE_URL."images/about.jpg"; ?>" />

<link rel="stylesheet" href="style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<div id="header">Tea-tango</div>
<div id="headerMenu">
	<?php
	if (!empty($_SESSION['me'])) {
		echo "<a href='" . SITE_URL . "library'><p class='headerMenuButton'><!-- マイライブラリ --><i class='fa fa-star'></i><br />ﾗｲﾌﾞﾗﾘ</p></a>";
		echo "<a href='" . SITE_URL . "timeline'><p class='headerMenuButton'><!-- 単語カード --><i class='fa fa-home'></i><br />ﾀｲﾑﾗｲﾝ</p></a>";
		echo "<a href='" . SITE_URL . "profile/".$_SESSION['me']['name']."'><p class='headerMenuButton'><i class='fa fa-user'></i><br />ﾌﾟﾛﾌｨｰﾙ</p></a>";
		echo "<a href='" . SITE_URL . "others'><p class='headerMenuButton'><!-- ヘルプ --><i class='fa fa-cog'></i><br />その他</p></a>";
	} else {
		echo "<a href='" . SITE_URL . "signup'><p class='headerMenuButton'><!-- 単語カード --><i class='fa fa-sign-in'></i><br />新規登録</p></a>";
		echo "<a href='" . SITE_URL . "timeline'><p class='headerMenuButton'><!-- 単語カード --><i class='fa fa-home'></i><br />ﾀｲﾑﾗｲﾝ</p></a>";
		echo "<a href='" . SITE_URL . "about'><p class='headerMenuButton'><i class='fa fa-info'></i><br />概要</p></a>";
		echo "<a href='" . SITE_URL . "help'><p class='headerMenuButton'><!-- ヘルプ --><i class='fa fa-question'></i><br />ﾍﾙﾌﾟ</p></a>";
	}
	?>
</div>
</body>
</html>
