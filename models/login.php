<?php

class Login {
	const NAME = 'me';

	public static function setId($id) {
		$_SESSION[self::NAME] = $id;
	}
}
