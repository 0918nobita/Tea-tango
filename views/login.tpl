<!DOCTYPE html>
<html lang="ja">
<head>
	<title>ログイン┃Tea-tango</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="eitango.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script language="javascript" src="eitango_header.js"></script>
</head>
<body>
	<script>header();</script>
	<div class="main">
		<h2>ログイン</h2>
		<form action="" method="post">
			<p><input type="text" name="email" placeholder="メールアドレス" /></p>
			<p><input type="password" name="password" placeholder="パスワード" /></p>
			<input type="hidden" name="token" value="{$token}" />
			<p><input type="submit" value="ログイン"><a href="signup.php">新規登録はこちら！</a></p>
		</form>
		<p>バグ等を発見した場合はTwitter <a href="http://twitter.com/0918nobita" style="text-decoration:none;">@0918nobita</a> までご連絡ください。</p>
	</div>
</body>
</html>
