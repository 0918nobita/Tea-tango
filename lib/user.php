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
		if (isset($result['id'])) {
			$this->id = $result['id'];
		}
		if (isset($result['name'])) {
			$this->name = $result['name'];
		}
		if (isset($result['email'])) {
			$this->email = $result['email'];
		}
		if (isset($result['password'])) {
			$this->password = $result['password'];
		}
		if (isset($result['introduce'])) {
			$this->introduce = $result['introduce'];
		}
		if (isset($result['created'])) {
			$this->created = $result['created'];
		}
		if (isset($result['modified'])) {
			$this->modified = $result['modified'];
		}
	}

	public static function find($id) {
		$sql = 'select * from users where id = ?';
		$sth = getPdoInstance()->prepare($sql);
		$sth->execute(array($id));
		return new self($sth->fetch());
	}

	public static function findById($id) {
		return self::find($id);
	}

	public function findByEmail($email) {
		$sql = 'select * from users where email = ?';
		$sth = getPdoInstance()->prepare($sql);
		$sth->execute(array($email));
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
