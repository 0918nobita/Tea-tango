{config_load file=$configFile section="others"}
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>{#othersPageTitle#}</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<style>
</style>
</head>
<body>
{include file="header.tpl"}
<div id="titleBar">
	{#titleBar#}
</div>
<div id="main">
	<ul>
		<li><a href="change_language">{#language#}</a></li>
		<li><a href="profile_edit">{#editProfile#}</a></li>
		<li><a href="logout">{#logout#}</a></li>
		<li><a href="http://goo.gl/forms/MYgCnxFlca" target="_blank">{#inquiry#}</a></li>
		<li><a href="help">{#help#}</a></li>
	</ul>
</div>
{include file="footer.tpl"}
</body>
</html>
