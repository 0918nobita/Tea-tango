function header(){
	document.write('<!DOCTYPE html>\
<html>\
	<head>\
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>\
		<title>埋め込みヘッダー＆jQuery使用メニュー</title>\
		<meta charset="UTF-8">\
		<link rel="stylesheet" type="text/css" href="eitango.css">\
	</head>\
<body>\
<div class="title"></div>\
<h2 class="title_text">\
	<div class="menu_button">\
	   <img src="menu.png" height="60px">\
	</div>\
	<div class="titletext">\
		<a href="index.php" style="text-decoration:none;" title="トップページへ">Tea-tango</a>\
	</div>\
	<div class="menu">\
		<div class="menu_Help btn">\
			<font size="5em"><a href="eitango_help.php" style="text-decoration:none;">ヘルプ</a></font>\
		</div>\
		<div class="menu_About btn">\
			<font size="5em"><a href="eitango_about.php" style="text-decoration:none;">Tea-tangoとは</a></font>\
		</div>\
		<div class="menu_Close btn">\
			<font size="5em">×閉じる</font>\
		</div>\
	</div>\
</h2>\
<script src="eitango_header.js"></script>\
	</body>\
</html>\'');
}
var $menu_open;
$(function(){
	$('.menu_button').click(function(){
		$('.menu').slideDown('400');
		$('.menu_Help').slideDown('400');
		$('.menu_About').slideDown('400');
		$('.menu_Close').slideDown('400');
		$('.main').animate({'margin-top':'13em'},'400');
		$('menu_Help').css('display','block');
		$('menu_About').css('display','block');
		$('menu_Close').css('display','block');
		$(this).hide();
	});
	if(navigator.cookieEnabled == true) {
	}else{
		$('.cookie_alert').slideDown('400');
	}
	$('.menu_Close').click(function(){
		$('.menu').slideUp('400');
		$('.menu_Help').hide();
		$('.menu_About').hide();
		$('.menu_Close').hide();
		$('.main').animate({'margin-top':'3em'},'200');
		$('.menu_button').show();
	});
});