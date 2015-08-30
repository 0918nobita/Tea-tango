{include file="header.tpl"}
{config_load file=$configFile section="profile"}
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>{$screen_name}({$name}) | Tea-tango</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
<div id="titleBar">
	{#titleBar#}
</div>
<div id="main">
	<p><font size="5em">{$screen_name}</font><br />{$name}</p>
	{if $myName == $name}
		<p><a href="{$site_url}profile_edit"><input type="button" value="{#editProfileButton#}"></a></p>
	{/if}
	<p>{$profile}</p>
	{foreach from=$card_list item=array}
		<div class="card">
			<div class="card_author">
				<a href="{$array['author']}">{$array['author']}</a>
			</div>
			<div class="card_contents">
				{$array['front']}　=>　{$array['back']}
			</div>
		</div>
	{/foreach}
</div>
</body>
</html>
