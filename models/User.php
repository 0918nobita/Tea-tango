<?php

class UserModel
{
	private $db;

	public function __construct()
	{
		try {
			$this->db = new PDO(DSN, '', '');
		} catch(PDOException $e) {
			echo 'Error: '.$e->getMessage();
			die();
		}
	}
	public function getUserByName($name)
	{
		$stmt = $this->db->prepare('SELECT * FROM users WHERE name = :name LIMIT 1');
		$stmt->bindValue(":name", $name, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function getUserByEmail($email)
	{
		$stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
		$stmt->bindValue(":email", $email, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function signUp($name, $screenName, $email, $password)
	{
		$sql = "insert into user(name, screen_name, email, password)
				values(:name, :screen_name, :email, :password)";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array(
			":name" => $name,
			":screen_name" => $screenName,
			":email" => $email,
			":password" => $password
		));
	}
	public function login($userNameOrEmail, $password)
	{
		# $emailOrEmailがメールアドレスかどうかをチェックする
		if (filter_var($userNameOrEmail, FILTER_VALIDATE_EMAIL)) {
			# メールアドレスでユーザー情報を取得
			$user = $this->getUserByEmail($userNameOrEmail);
		} else {
			# ユーザー名でユーザー情報を取得
			$user = $this->getUserByName($userNameOrEmail);
		}
		
		/*
			$user['password']をハッシュ化したものと、$passwordをハッシュ化したものとを比較して一致すれば
			$userを$_SESSION['me']に代入してログイン完了
		*/

		if (hash_hmac("sha512", $password, HASH_SECRET_KEY) == $user['password']) {
			$_SESSION['me'] = $user;
		}
	}
}