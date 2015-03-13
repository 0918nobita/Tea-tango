<?php
class Dispatcher {
	public static function get($param, $name) {
		self::dispatch($param, $name, 'GET');
	}

	public static function post($param, $name) {
		self::dispatch($param, $name, 'POST')
	}

	public static function dispatch($param, $name, $method = 'GET') {
		if ($param == self::get_param() && $method == $_SERVER['REQUEST_METHOD']) {
			require_once $name . (substr($name, -1, strlen('.php')) != '.php' ? '.php' : '');
			return true;
		}
	}

	public static function get_param() {
        return str_replace(dirname($_SERVER['SCRIPT_NAME']), '', substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?') ? strpos($_SERVER['REQUEST_URI'], '?') : strlen($_SERVER['REQUEST_URI'])));
	}
}
