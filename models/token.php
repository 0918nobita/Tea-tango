<?php
class Token {
	const NAME = "\0__TOKENS__\0";

	public static function create() {
		self::init();
		return $_SESSION[self::SESSION_VAR_NAME][] = sha1(uniqid(mt_rand(), true));
	}

	public static function check($token) {
		self::init();
		if ($key = array_search($token, $_SESSION[self::SESSION_VAR_NAME]) != false) {
			unset($_SESSION[self::SESSION_VAR_NAME][$key]);
			return true;
		}
		return false;
	}

	private static function init() {
		if (!isset($_SESSION[self::SESSION_VAR_NAME]) || !is_array($_SESSION[self::SESSION_VAR_NAME])) {
			$_SESSION[self::SESSION_VAR_NAME] = array();
		}
	}
}
