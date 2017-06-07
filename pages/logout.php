<?php
	session_start();
  require_once("inc/includes.php");
	$result = $User->DoLogout($_SESSION['token']);
	unset($_SESSION['token']);
	echo "<h1>Logged Out!</h1>";
?>
