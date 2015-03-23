<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>{$my_name}|Tea-tango</title>
<script type="text/javascript">
function link() {
	location.href="index.php?p=profile_edit";
}
</script>
</head>
<body>
<div id="main">
<div id="page-title">
<div id="page-title-text"><p>{$my_name}のプロフィール</p></div>
</div>
<div id="main-text">
<p>{$my_introduce}</p>
{if $myself == 1}
<button type="button" onClick="link()"><font size="5">プロフィール編集</font></button>
{/if}
<link rel="stylesheet" href="http://ttan5.zz.vc/test2/eitango.css"><h2>投稿単語帳</h2>{foreach $my_wordcards as $wordcard}
<div class="object"><p><b><a href="index.php?lang={$lang}&p=wordcard&id={$wordcard.id}">{$wordcard.name}</a></b></p><p>{$wordcard.description}</p></div>
{/foreach}</div>
</div>
</body>
</html>