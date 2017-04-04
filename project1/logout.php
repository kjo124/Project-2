<?php
	session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["pass"]);
   
	
	header('Refresh: 0; URL = login.php');
	session_destroy();
?>
