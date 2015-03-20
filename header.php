<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" type="text/css" href="eitango.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
</head>
<body>
<div id="black_filter"></div>
<div id="header_back"><div id="header_text"><font size="7"><?php echo '<a href="index.php?lang='.$_SESSION['lang'].'" style="text-decoration:none;">'; ?>Tea-tango</a></font></div></div>
<?php
session_start();
require_once('config.php');
require_once('functions.php');
if ($_GET['lang']=='en') {
	$_SESSION['lang'] = 'en';
} else {
	$_SESSION['lang'] = 'ja';
}
require_once('language.php');
$me = $_SESSION['me'];
//ログインしていない場合
if (empty($_SESSION['me'])) {
	echo '
	<div id="side_menu">
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/login.php?lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('ログイン',$_SESSION['lang']).'</a></p>
		</div>
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/signup.php?lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('新規登録',$_SESSION['lang']).'</a></p>
		</div>
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/?p=help&lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('ヘルプ',$_SESSION['lang']).'</a></p>
		</div>
	</div>
	<div id="side_menu_open_btn">
		<i class="fa fa-bars"></i>
	</div>';
}
//ログイン済みの場合
if (!empty($_SESSION['me'])) {
	echo '
	<div id="side_menu">
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/?p=profile&id='.$me['id'].'&lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.$me['name'].'</a></p>
		</div>
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/?p=my_wordcard&lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('マイ単語帳',$_SESSION['lang']).'</a></p>
		</div>
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/?p=wordcard_add&lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('単語帳追加',$_SESSION['lang']).'</a></p>
		</div>
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/?p=card_add&lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('問題追加',$_SESSION['lang']).'</a></p>
		</div>
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/?p=performance&lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('成績',$_SESSION['lang']).'</a></p>
		</div>
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/?p=notice&lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('お知らせ',$_SESSION['lang']).'</a></p>
		</div>
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/?p=help&lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('ヘルプ',$_SESSION['lang']).'</a></p>
		</div>
		<div class="item">
			<p><a href="http://ttan5.zz.vc/test2/logout.php?lang='.$_SESSION['lang'].'" style="text-decoration:none;">'.lang('ログアウト',$_SESSION['lang']).'</a></p>
		</div>
	</div>
	<div id="side_menu_open_btn">
		<i class="fa fa-bars"></i>
	</div>';
}
?>
<script>
var main = $('#main');
var side_menu = $('#side_menu');
var black_filter = $('#black_filter');
var side_menu_open_btn = $('#side_menu_open_btn');
$a = 0;
$(document).ready(function(){
$('#page-title-text').animate({paddingLeft:"4em",opacity:1},'slow');
});
side_menu_open_btn.click(function(){
	if ($a == 0) {
		side_menu.show().css('z-index','4').css('box-shadow','10px 0px rgba(0,0,0,0,4)');
		black_filter.css('display','inline');
		main.css('pointer-events','none');
		$a = 1;
	} else {
		main.css('pointer-events','auto');
		side_menu.css('boxsadow','none').css('z-index','1').hide();
		black_filter.css('display','none');
		$a = 0;
	}
});
black_filter.click(function(){
	if ($a == 1) {
		main.css('pointer-events','auto');
		side_menu.css('boxsadow','none').css('z-index','1').hide();
		black_filter.css('display','none');
		$a = 0;
	}
});
</script>
</body>
</html>