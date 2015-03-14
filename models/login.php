<?php

class Login {
	const ME = 'me';

	public static function setMe($me) {
		$_SESSION[self::ME] = $me;
	}
}
