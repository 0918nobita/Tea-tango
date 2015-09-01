{config_load file=$configFile section="timeline"}
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>{#timelinePageTitle#}</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
{include file="header.tpl"}
<div id="titleBar">
	{#titleBar#}
</div>
<div id="main">
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
{include file="footer.tpl"}
</body>
</html>
