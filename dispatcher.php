<?php
class Dispatcher {
	public static function get($param, $name) {
		self::dispatch($param, $name, 'GET');
	}

	public static function dispatch($param, $name, $method = 'GET') {
		if ($param == self::get_param() && $method == $_SERVER['REQUEST_METHOD']) {
			require_once $name;
		}
	}

	public static function get_param() {
        return str_replace(dirname($_SERVER['SCRIPT_NAME']), '', substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?') ? strpos($_SERVER['REQUEST_URI'], '?') : strlen($_SERVER['REQUEST_URI'])));
	}
}
