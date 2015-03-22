<?php

class User {
	private $id = 0;
	private $name = '';
	private $email = '';
	private $introduce = '';
	private $created = '';	

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
