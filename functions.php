<?php

function connectDb() {
	try {
		return new PDO(DSN, "", "");
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

function h($s) {
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

function getUser($email, $password, $dbh) {
	$sql = "select * from users where email = :email and password = :password limit 1;";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":email"=>$email, ":password"=>getSha1PAssword($password)));
	$user = $stmt->fetch();
	return $user ? $user : false;
}

function getUserByName($name, $dbh) {
	$sql = "select * from users where name = :name limit 1;";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":name"=>$name));
	$user = $stmt->fetch();
	return $user ? true : false;
}

function getScreenNameByName($name, $dbh) {
	$sql = "select screen_name from users where name = :name limit 1;";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":name"=>$name));
	$user = $stmt->fetch();
	return $user ? $user[0] : false;
}

function getProfileByName($name, $dbh) {
	$sql = "select profile from users where name = :name limit 1";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":name"=>$name));
	$result = $stmt->fetch();
	return $result ? $result[0] : false;
}