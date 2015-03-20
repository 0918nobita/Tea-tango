<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>お知らせ | Tea-tango</title>
</head>
<body>
<div id="main">
<div id="page-title">
<div id="page-title-text"><p>お知らせ</p></div>
</div>
{foreach $notices as $notice}
<div class="object"><p><b>{$notice.title}</b></p>
<p>{$notice.text}</p></div>
{/foreach}
</div>
</body>
</html>