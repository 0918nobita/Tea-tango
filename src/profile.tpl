<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>{$my_name}┃Tea-tango</title>
</head>
<body>
<div id="main">
<div id="page-title">
<div id="page-title-text"><p>{$my_name}のプロフィール</p></div>
</div>
{foreach $my_wordcards as $wordcard}
<div class="object"><p><b>{$wordcard.name}</b></p>
<p>{$wordcard.description}</p></div>
{/foreach}
</div>
</body>
</html>