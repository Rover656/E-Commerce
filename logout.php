<?php
	session_start();
    require_once("inc/includes.php");
	$result = $User->DoLogout($_SESSION['token']);
	unset($_SESSION['token']);
	header("Location: index.php");
?>