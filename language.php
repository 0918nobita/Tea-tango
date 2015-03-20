<?php 

function lang($word, $lang = '') {
	return getWord($word, $lang);
}

function getWord($word, $lang = '') {
	if ($lang == '') {
		$lang = $_SESSION['lang'];
	}
	return json_decode(file_get_contents(buildLangFileName($lang)))[$word];
}

function setLang($lang) {
	if (is_file(buildLangFileName($lang))) {
		$_SESSION['lang'] = $lang;
	}
}

function buildLangFileName($lang) {
	return 'lang/' . $lang . substr($lang, -1, strlen('.json')) ? '.json' : '';
}
