<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<?php
	if (isset($_SESSION['me'])) {
		echo "<a href=''><div id='footer'><i class='fa fa-pencil-square-o'></div></a>";
	} else {
		echo "<a href='login'><div id='footer'><i class='fa fa-sign-in'>　ログイン</div></a>";
	}
	?>
</body>
</html>