<?php

require_once __DIR__ . '/../functions.php';

class User {
	private $id = 0;
	private $name = '';
	private $email = '';
	private $introduce = '';
	private $created = '';

	public function __construct($result = array()) {
		$this->id = isset($result['id']) ? $result['id'] : 0;
		$this->name = isset($result['name']) ? $result['name'] : '';
		$this->email = isset($result['email']) ? $result['email'] : '';
		$this->introduce = isset($result['introduce']) ? $result['introduce'] : '';
		$this->created = isset($result['created']) ? $result['created'] : '';
	}

	public static function find($id) {
		$sql = 'select * from users where id = ?';
		$sth = connectDb()->prepare($sql);
		$sth->execute(array($id));
		$result = $sth->fetch();
		$user = (new self)
			->setId($result['id'])
			->setName($result['name'])
			->setEmail($result['email'])
			->setIntroduce($result['introduce'])
			->setCreated($result['created']);
		return $user;
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

	public function getIntroduce() {
		return $this->introduce;
	}

	public function getCreated() {
		return $this->created;
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

	public function &setIntroduce($introduce) {
		$this->introduce = $introduce;
		return $this;
	} 

	public function &setCreated($created) {
		$this->created = $created;
		return $this;
	}
}
