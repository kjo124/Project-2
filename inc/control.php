<?php
$sessionName = "project2_session";
session_name ( $sessionName );
session_start ();

if (! isset ( $_SESSION ['userName'] )) {
	$_SESSION ['userName'] = "Guest";
}
?>
