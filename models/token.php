<?php
class Token {
	const TOKEN = "\0__TOKEN__\0";
	const MAX = 10;

	public static function create() {
		self::init();
		array_slice($_SESSION[self::TOKEN], 0, MAX - 1);
		return $_SESSION[self::SESSION_VAR_TOKEN][] = sha1(uniqid(mt_rand(), true));
	}

	public static function check($token) {
		self::init();
		if ($key = array_search($token, $_SESSION[self::SESSION_VAR_TOKEN]) != false) {
			unset($_SESSION[self::SESSION_VAR_TOKEN][$key]);
			return true;
		}
		return false;
	}

	private static function init() {
		if (!isset($_SESSION[self::SESSION_VAR_TOKEN]) || !is_array($_SESSION[self::SESSION_VAR_TOKEN])) {
			$_SESSION[self::SESSION_VAR_TOKEN] = array();
		}
	}
}
