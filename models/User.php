<?php

class UserModel
{
	private $db;

	public function __construct()
	{
		try {
			$this->db = new PDO('sqlite: tea-tango.db', '', '');
		} catch(PDOException $e) {
			echo 'Error: '.$e->getMessage();
			die();
		}
	}
	public function getUserByName($name)
	{
		$this->db->prepare('select * from users where name = :name');
		$this->db->bindValue(':name', $name, PDO::PARAM_STR);
		$this->db->execute();
		return $this->db->fetchAll();
	}
	public function getUserByEmail($email)
	{
		$this->db->prepare('select * from users where email = :email');
		$this->db->bindValue(':email', $email, PDO::PARAM_STR);
		$this->db->execute();
		return $this->db->fetchAll();
	}
	public function login($email, $password)
	{
		$user = $this->getUserByName($name);
		
		/*
			$user['password']と、$passwordを暗号化したものとを比較して一致すれば
			$userを$_SESSION['me']に代入してログイン完了
		*/
	}
}