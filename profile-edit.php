<?php
session_start();
require_once 'header.php';
$me = $_SESSION['me'];
$dbh = connectDb();
$sql = "update users set introduce=? where id=?";
$stmt = $dbh->prepare($sql);
$flag = $stmt->execute(array($_POST['introduce'],$me['id']));
if ($flag) {
	echo '<script>alert("データの更新に成功しました");</script>';
} else {
	echo '<script>alert("データの更新に失敗しました");</script>';
}
$dbh = null;
header('Location:index.php?p=profile&id='.$me['id'].'&lang='.$_SESSION['lang']);
?>
