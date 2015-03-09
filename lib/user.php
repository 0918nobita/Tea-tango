<?php
require_once dirname(__FILE__) . '/../functions.php';

class User {
	private $name = '';	
	private $email = '';
	private $password = '';
	private $created = '';
	private $modified = '';

	public function __construct($name = '', $email = '', $password = '', $created = '', $modified = '') {
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->created = $created;
		$this->modified = $modified;
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
