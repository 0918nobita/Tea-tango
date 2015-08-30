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
<meta property="og:image" content="http://ttan5.exout.net/images/logo258x258.png">
<!-- Twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@0918nobita" />
<meta name="twitter:title" content="Tea-tango">
<meta name="twitter:description" content="単語帳を作っている時間が省ける！デジタル単語帳共有Webサービス" />
<meta name="twitter:image" content="http://ttan5.exout.net/images/logo258x258.png" />

<link rel="shortcut icon" href="../images/favicon.ico">
<link rel="icon" href="../images/favicon.ico">
<link rel="stylesheet" href="style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<div id="header">Tea-tango</div>
<div id="headerMenu">
	{config_load file="$configFile" section="header"}
	{if $login == "true"}
		<a href="library"><p class="headerMenuButton"><i class='fa fa-star'></i><br />{#library#}</p></a>
		<a href="timeline"><p class="headerMenuButton"><i class="fa fa-home"></i><br />{#timeline#}</p></a>
		<a href="{$myName}"><p class="headerMenuButton"><i class="fa fa-user"></i><br />{#profile#}</p>
		<a href="others"><p class="headerMenuButton"><i class="fa fa-cog"></i><br />{#others#}</p></a>
	{else}
		<a href="signup"><p class="headerMenuButton"><i class="fa fa-sign-in"></i><br />{#signup#}</p></a>
		<a href="timeline"><p class="headerMenuButton"><i class="fa fa-home"></i><br />{#timeline#}</p></a>
		<a href="about"><p class="headerMenuButton"><i class="fa fa-info"></i><br />{#about#}</p>
		<a href="help"><p class="headerMenuButton"><i class="fa fa-question"></i><br />{#help#}</p></a>
	{/if}
</div>
</body>
</html>