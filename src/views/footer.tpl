<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
</head>
<body>
{config_load file="$configFile" section="footer"}
{if $login == "true"}
	<a href=""><div id="footer"><i class="fa fa-pencil-square-o"></div></a>
{else}
	<a href="login"><div id="footer"><i class="fa fa-sign-in">　{#login#}</div></a>
{/if}
</body>
</html>