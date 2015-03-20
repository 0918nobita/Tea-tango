<?php 
/**
 * Get word
 * 
 * @param string $word word name
 * @param string $lang lang package name
 * 
 * @return string word
 */
function getWord($word, $lang = '') {
	if ($lang == '') {
		$lang = $_SESSION['lang'];
	}
	return json_decode(file_get_contents(buildLangFileName($lang)))[$word];
}

function lang($word, $lang = '') {
	return getWord($word, $lang);
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
