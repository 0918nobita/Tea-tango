<?php

require_once __DIR__ . '/../functions.php';

class User {
	private $id = 0;
	private $name = '';
	private $email = '';
	private $password = '';
	private $introduce = '';
	private $created = '';
	private $modified = '';

	public function __construct($result = array()) {
		$this->id = isset($result['id']) ? $result['id'] : 0;
		$this->name = isset($result['name']) ? $result['name'] : '';
		$this->email = isset($result['email']) ? $result['email'] : '';
		$this->password = isset($result['password']) ? $result['password'] : '';
		$this->introduce = isset($result['introduce']) ? $result['introduce'] : '';
		$this->created = isset($result['created']) ? $result['created'] : '';
		$this->modified = isset($result['modified']) ? $result['modified'] : '';
	}

	public static function find($id) {
		$sql = 'select * from users where id = ?';
		$sth = connectDb()->prepare($sql);
		$sth->execute(array($id));
		return new self($sth->fetch());
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

	public function getIntroduce() {
		return $this->introduce;
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

	public function &setIntroduce($introduce) {
		$this->introduce = $introduce;
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
