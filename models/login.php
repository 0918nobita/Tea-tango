<?php

class Login {
	const ME = 'me';

	public static function getMe($me) {
		return $_SESSION[self::ME];
	}

	public static function setMe($me) {
		$_SESSION[self::ME] = $me;
	}
}
