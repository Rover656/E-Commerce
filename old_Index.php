<?php
// Begin the site session
session_start();
//New Includes
require_once("inc/includes.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php
	//Load in the head
	require_once($themeUri . 'inc/head.php');
?>
</head>
<body>
<?php
	//Load in the body
	require_once($themeUri . '/inc/body.php');
?>
	
<?php
	include_once($themeUri . "inc/footer.php");
?>
</body>
</html>
