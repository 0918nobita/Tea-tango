<!DOCTYPE html>
<html lang="ja">
<head>
<title>ヘルプ┃Tea-tango</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" type="text/css" href="assets/style.css">
<script language="javascript" src="assets/header.js"></script>
<!-- jQuery.jsの読み込み -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script>
$(function(){
   $('a[href^=#]').click(function() {
      var speed = 400;
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top;
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});
</script>
</head>
<body>
<script>header();</script>
<div class="cookie_alert">
    <p>ブラウザの設定画面からCookieを有効にしてください。Cookieが無効になったままだと、成績データを保存できません。</p>
</div>
<div class="main">
    <h2>Tea-tangoのヘルプ</h2>
    <p>　Tea-tangoについてわからないことがあれば、まずはこのヘルプで確認し、それでも解決しない場合はお問い合わせください。</p>
    <div class="list">
        <ul>
            <li><a href="#q1">Tea-tangoは無料で使える？</a></li><br />
            <li><a href="#q2">Tea-tangoは登録制？</a></li><br />
            <li><a href="#q3">Tea-tangoはだれが開発してる？</a></li><br />
            <li><a href="#q4">「このページでこれ以上ダイアログボックスを生成しない」をタッチしてしまいました。</a></li>
        </ul>
    </div>
    <div class="help">
        <h3 name="q1" id="q1">Tea-tangoは無料で使える？</h3>
        <p>　はい。すべての機能を無料で利用できます。</p>
        <h3 name="q2" id="q2">Tea-tangoは登録制？</h3>
        <p>　いいえ、登録制ではありません。</p>
        <h3 name="q3" id="q3">Tea-tangoはだれが開発してる？</h3>
        <p>0918nobitaが開発しています。Twitter → <a href="https://twitter.com/0918nobita" target="_blank">こちら</a></p>
        <h3 name="q4" id="q4">「このページでこれ以上ダイアログボックスを生成しない」をタッチしてしまいました。</h3>
        <p>ブラウザを再起動してください。(スマートフォンの場合、マルチタスキングからブラウザを削除して動作を一度停止させ、もう一度ホーム画面から起動する操作にあたります。)</p>
    </div>
<p>バグ等を発見した場合はTwitter <a href="http://twitter.com/0918nobita" style="text-decoration:none;">@0918nobita</a> までご連絡ください。</p>
</div>
</body>
</html>
