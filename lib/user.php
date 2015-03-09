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

	public function save() {
		$sql = 'insert into users values (?, ?, ?, ?, ?) on duplicate key update id = ?, name = ?, email = ?, created = ?, modified = ?';
		$sth = connectDb()->prepare($sql);
		$sth->execute(array($this->id, $this->name, $this->email, $this->password, $this->created, $this->modified, $this->id, $this->name, $this->email, $this->password, $this->created, $this->modified));
	}

	public static function find($id) {
		return self::findById($id);
	}

	public static function findById($id) {
		$sql = 'select * from users where id = ? limit 1';
		$sth = connectDb()->prepare($sql);
		$sth->execute(array($id));
		$result = $sth->fetch();
		return (new self)
			->setId($result['id'])
			->setName($result['name'])
			->setEmail($result['email'])
			->setPassword($result['password'])
			->setCreated($result['created'])
			->setModified($result['modified']);
	}

	public static function findByEmail($email) {
		$sql = 'select * from users where email = ? limit 1';
		$sth = connectDb()->prepare($sql);
		$sth->execute(array($email));
		$result = $sth->fetch();
		return (new self)
			->setId($result['id'])
			->setName($result['name'])
			->setEmail($result['email'])
			->setPassword($result['password'])
			->setCreated($result['created'])
			->setModified($result['modified']);
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
