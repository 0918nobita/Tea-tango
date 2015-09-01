{config_load file=$configFile section="error"}
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>{#errorPageTitle#}</title>
</head>
<body>
{include file="header.tpl"}
<div id="titleBar">
	{#titleBar#}
</div>
<div id="main">
	<p>{#errorDetails#}</p>
	<p><a href="timeline">{#goBack#}</a></p>
</div>
{include file="footer.tpl"}
</body>
</html>