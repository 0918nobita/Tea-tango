<?php

require_once __DIR__ . '/../config.php';

class Password {
	public function hashPassword($password) {
		return sha1(PASSWORD_KEY . $password);
	}
}
