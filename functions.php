<?php

require_once __DIR__.'/config.php';

function connectDb() {
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

function h($s) {
	return htmlspecialchars($s,ENT_QUOTES,"UTF-8");
}

function setToken() {
	$token = sha1(uniqid(mt_rand(),true));
	$_SESSION['token'] = $token;
}

function checkToken() {
	if (empty($_SESSION['token'])||($_SESSION['token']!=$_POST['token'])) {
		echo '不正なPOSTが行われました。';
		exit();
	}
}
class User {
	public $id;
	public $name;
	public $introduce;
	public $created;
	public $user = array();
	public function findById() {
		$stmt = connectDb()->query('select * from users where id='.$this->id.' limit 1');
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$user[] = $data;
		}
		return array('id'=>$user[0]['id'],'name'=>$user[0]['name'],'email'=>$user[0]['email'],'introduce'=>$user[0]['introduce'],'created'=>$user[0]['created']);
	}
	public function findByName() {
		$stmt = connectDb()->query('select * from users where name='.$this->name.' limit 1');
		while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$user[] = $data;
		}
		return array('id'=>$user[0]['id'],'name'=>$user[0]['name'],'email'=>$user[0]['email'],'introduce'=>$user[0]['introduce'],'created'=>$user[0]['created']);
	}
}
function emailExists($email,$dbh) {
	$sql = "select * from users where email = :email limit 1";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(":email"=>$email));
	$user = $stmt->fetch();
	return $user ? true : false;
}

function getSha1Password($s) {
	return (sha1(PASSWORD_KEY.$s));
}