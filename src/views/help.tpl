{config_load file=$configFile section="help"}
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>{#helpPageTitle#}</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
{include file="header.tpl"}
<div id="titleBar">
	{#titleBar#}
</div>
<div id="main">
	<p>{#helpPageDescription#}</p>
	<h3>迷惑行為等への対応について</h3>
	<p>公序良俗に反する内容の投稿をしているユーザーには、すぐにその内容を修正するようにメールで警告します。長期間修正が行われていない場合、または迷惑行為が継続されている場合はアカウントを削除させていただきます。</p>
	<h3>アカウント登録は必須？</h3>
	<p>閲覧のみならばアカウント登録は必要ありませんが、単語カードを投稿したり「マイライブラリ」機能を利用するためにはアカウント登録が必要となります。</p>
	<h3>退会手続きについて</h3>
	<p>既にアカウント登録が完了しログインしている方は<a href="secede.php">こちら</a>から退会ができます。</p>
</div>
{include file="footer.tpl"}
</body>
</html>
