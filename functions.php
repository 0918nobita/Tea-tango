<?php
function &connectDb() {
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

function getPdoInstance() {
	return connectDb();
}

function h($s) {
	return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function setToken() {
	$token = sha1(uniqid(mt_rand(), true));
	$_SESSION['token'] = $token;
}

function checkToken() {
	if (empty($_SESSION['token']) || ($_SESSION['token'] != $_POST['token'])) {
		echo '不正なPOSTが行われました。';
		exit;
	}
}

function userInfo($id) {
	$dbh = connectDb();
	$stmt = $dbh->query('select * from users where id=' . $id . ' limit 1');
	$data = $stmt->fetch(PDO::FETCH_ASSOC)
	return $data[0];
}

function emailExists($email, $dbh) {
	$sql = 'select * from users where email = :email limit 1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(':email' => $email));
	$user = $stmt->fetch();
	return $user ? true : false;
}

function getSha1Password($s) {
	return sha1(PASSWORD_KEY . $s);
}
