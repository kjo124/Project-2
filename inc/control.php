<?php
$exNumText = '01';
$sessiName = "ct310auth15_ex_" . $exNumText . "_session_2017";
session_name ( $sessiName );
session_start ();
$host = $_SERVER ['HTTP_HOST'];
$uri = rtrim ( dirname ( $_SERVER ['PHP_SELF'] ), '/\\' );

if (! isset ( $_SESSION ['startTime'] )) {
	$_SESSION ['startTime'] = time ();
}
if (! isset ( $_SESSION ['userName'] )) {
	$_SESSION ['userName'] = "Guest";
}
if (!$loginPage && ($_SESSION ['userName'] == "Guest")) {
 	header ( "Location: https://$host$uri/login.php" );
	exit ();
}
?>
