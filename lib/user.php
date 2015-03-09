<?php
require_once dirname(__FILE__) . '/../functions.php';

class User {
	private $id = 0;
	private $name = '';	
	private $email = '';
	private $password = '';
	private $created = '';
	private $modified = '';

	public function __construct($id = 0, $name = '', $email = '', $password = '', $created = '', $modified = '') {
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->created = $created;
		$this->modified = $modified;
	}

	public static function find($id) {
		$sql = 'select * from users where id = ? limit 1';
		$sth = connectDb()->prepare($sql);
		$sth->execute(array($id));
		$user = $sth->fetch();
		return (new self)
			->setId($user['id'])
			->setName($user['name'])
			->setEmail($user['email'])
			->setPassword($user['password'])
			->setCreated($user['created'])
			->setModified($user['modified']);
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getCreated() {
		return $this->created;
	}

	public function getModified() {
		return $this->modified;
	}

	public function &setId($id) {
		$this->id = $id;
		return $this;
	}

	public function &setName($name) {
		$this->name = $name;
		return $this;
	}

	public function &setEmail($email) {
		$this->email = $email;
		return $this;
	}

	public function &setPassword($password) {
		$this->password = $password;
		return $this;
	}

	public function &setCreated($created) {
		$this->created = $created;
		return $this;
	}

	public function &setModified($modified) {
		$this->modified = $modified;
		return $this;
	}
}
