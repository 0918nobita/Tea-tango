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
		$this->db->prepare('select * from users where email = :email');
		$this->db->bindValue(':email', $email, PDO::PARAM_STR);
		$this->db->execute();
		return $this->db->fetchAll();
	}
	public function signup($name, $screenName, $profile, $email, $password)
	{
		$sql = "insert into user(name, screen_name, email, password)
				values(:name, :screen_name, :email, :password)";
		$stmt = $this->db->prepare($sql);
		$params = array(
			":name" => $name,
			":screen_name" => $screen_name,
			":email" => $email,
			":password" => $password
			);
		$stmt->execute($params);
	}
	public function login($emailOrEmail, $password)
	{
		# $emailOrEmailがメールアドレスかどうかをチェックする
		if (filter_var($emailOrEmail, FILTER_VALIDATE_EMAIL)) {
			# メールアドレスでユーザー情報を取得
			$user = $this->getUserByEmail($emailOrEmail);
		} else {
			# ユーザー名でユーザー情報を取得
			$user = $this->getUserByName($emailOrEmail);
		}
		
		/*
			$user['password']と、$passwordを暗号化したものとを比較して一致すれば
			$userを$_SESSION['me']に代入してログイン完了
		*/

		if (hash_hmac("sha512", $password, HASH_SECRET_KEY) == $user['password']) {
			$_SESSION['me'] = $user;
		}
	}
}