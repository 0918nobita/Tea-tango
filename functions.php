<?php
function &getPdoInstance() {
	static $pdo;
	if (!isset($pdo)) {
		$pdo = new PDO(/* */);
	}
	return $pdo;
}
