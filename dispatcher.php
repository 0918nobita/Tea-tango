<?php
class Dispatcher {
	public static function get_param() {
        return str_replace(dirname($_SERVER['SCRIPT_NAME']), '', substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?') ? strpos($_SERVER['REQUEST_URI'], '?') : strlen($_SERVER['REQUEST_URI'])));
	}
}
