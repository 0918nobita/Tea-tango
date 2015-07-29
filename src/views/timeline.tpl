<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>効果的に暗記するならTea-tango！</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
<div id="titleBar">
	タイムライン
</div>
<div id="main">
	{foreach from=$card_list item=array}
		<p>{$array['front']} : {$array['back']} : <a href="profile/{$array['author']}">{$array['author']}</a> : {$array['created']}</p>
	{/foreach}
</div>
</body>
</html>