<?php

require_once('config.php');
require_once('functions.php');
require_once('header.php');

session_start();

$_SESSION = array();

if (!isset($_COOKIE[session_name()])) {
	setcookie(session_name(),'',time()-86400,'/');
}

session_destroy();

header('Location:login.php?lang='.$_SESSION['lang']);