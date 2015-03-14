<?php
require_once __DIR__ . '/confing.php';
require_once __DIR__ . '/Smarty-3.1.21/libs/Smarty.class.php';

function connectDb() {
	return getPdoInstance();
}

function &getPdoInstance() {
	static $dbh;
	if (!isset($dbh)) {
		try {
			$dbh = new PDO(DSN, DB_USER, DB_PASSWORD);
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
	return $dbh;
}

function &getSmartyInstance() {
	static $smarty;
	if (!isset($smarty)) {
		$smarty = new Smarty;
		$smarty->template_dir = 'views';
	}
	return $smarty;
}

function h($s) {
	return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function setToken() {
	$token = sha1(uniqid(mt_rand(), true));
	$_SESSION['token'] = $token;
}

function checkToken() {
	if (empty($_SESSION['token']) || $_SESSION['token'] != $_POST['token']) {
		echo '不正なPOSTが行われました。';
		exit;
	}
}

function emailExists($email) {
	$sql = 'select * from users where email = :email limit 1';
	$stmt = connectDb()->prepare($sql);
	$stmt->execute(array(':email' => $email));
	$user = $stmt->fetch();
	return $user ? true : false;
}

function getSha1Password($s) {
	return sha1(PASSWORD_KEY . $s);
}
