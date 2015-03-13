<?php

require_once('config.php');
require_once('functions.php');

session_start();

if (empty($_SESSION['me'])) {
	header('Location: login.php');
	exit();
}

$me = $_SESSION['me'];
