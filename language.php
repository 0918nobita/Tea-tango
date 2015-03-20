<?php 
function lang($a,$b) {
	if ($b=='en') {
		if (!isset($_SESSION['languagePackEn'][$a])) {
			return $a;
		} else {
			return $_SESSION['languagePackEn'][$a]; 
		}
	} else {
		return $a;
	}
}

/**
 * Set lang package
 * 
 * @param string $lang lang package name
 */
function setLang($lang) {
	if (is_file(buildLangFileName($lang))) {
		$_SESSION['lang'] = $lang;
	}
}

/**
 * Build lang package file name
 *
 * @param string $lang lang package name
 *
 * @return string lang package file name
 */
function buildLangFileName($lang) {
	return 'lang/' . $lang . substr($lang, -1, strlen('.json')) ? '.json' : '';
}
