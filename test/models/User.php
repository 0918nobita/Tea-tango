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
}