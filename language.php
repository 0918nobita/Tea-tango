<?php
function lang($a,$b) {
	if ($b=='en') {
		$json = file_get_contents(__DIR__.'/lang/en.json',true);
		$obj = json_decode($json,true);
		if (!isset($obj[$a])) {
			return $a;
		} else {
			return $obj[$a]; 
		}
	} else {
		return $a;
	}
}