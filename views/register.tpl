<!DOCTYPE html>
<html lang="ja">
<head>
<title>新規ユーザー登録┃Tea-tango</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" type="text/css" href="eitango.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script language="javascript" src="assets/header.js"></script>
</head>
<body>
<script>header();</script>
<div class="main">
<h2>新規ユーザー登録</h2>
<form action="" method="POST">
<p>お名前：<input type="text" name="name" value="">　<?php echo h($err['name']); ?></p>
<p>メールアドレス：<input type="text" name="email" value=""> <?php echo h($err['email']); ?></p>
<p>パスワード：<input type="password" name="password" value="">　<?php echo h($err['password']); ?></p>
<input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>"
<p><input type="submit" value="新規登録！">　<a href="index.php">戻る</a></p>
</form>
<p>バグ等を発見した場合はTwitter <a href="http://twitter.com/0918nobita" style="text-decoration:none;">@0918nobita</a> までご連絡ください。</p>
</div>
</body>
</html>
