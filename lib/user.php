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
}
