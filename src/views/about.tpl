<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>効率的に暗記するならTea-tango！</title>
</head>
<body>
{config_load file="../models/translate/ja/about.conf"}
<div id="titleBar">
	<!-- Tea-tangoをはじめよう -->
	{#titleBar#}
</div>
<div id="main">
	<!-- デジタル単語帳を、共有しよう -->
	<h2>{#shareDigitalWordcard#}</h2>
	<!-- 簡単に単語帳/単語カードを作成することができます。それをタイムラインで公開して、みんなに使ってもらえます。 -->
	<p>{#shareDigitalWordcardDetails#}</p>
	<!-- 他のユーザーが作った<br />単語帳/単語カードを<br />「マイライブラリ」に追加しよう -->
	<h2>{#addWordcardToMyLibrary#}</h2>
	<!-- 他のユーザーが作成した単語帳/単語カードを、自分の単語帳の置き場所「マイライブラリ」に追加して、使いたいときにすぐ表示できるようにできます。 -->
	<p>{#addWordcardToMyLibraryDetails#}</p>
	<!-- 閲覧だけなら、会員登録は必要ありません -->
	<h2>{#browseWithoutRegistering#}</h2>
	<p></p>
	<div id="letsstartButton"><a href="timeline" style="text-decoration: none;">さぁ、はじめよう</a></div>
</div>
</body>
</html>