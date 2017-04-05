<?php

require_once "assets/passwordLib.php";

class User {
	public $user_name = ''; /* First then last name with space */
	public $hash = ''; /* Hash of password */
}
function makeNewUser($name, $h) {
	$u = new User ();
	$u->$user_name = $name;
	$u->hash = $h;
	return $u;
}
function setupDefaultUsers() {
	$users = array ();
	$i = 0;
	$users [$i ++] = makeNewUser ( 'Simons', 'Cat', '$2y$10$duu7O.7GM5dZp1LBtrGLm.eg.649dJKdhKHVtup8yqlny1flKQoNe' );
	writeUsers ( $users );
}
function writeUsers($users) {
	$fh = fopen ( 'users.csv', 'w+' ) or die ( "Can't open file" );
	fputcsv ( $fh, array_keys ( get_object_vars ( $users [0] ) ) );
	for($i = 0; $i < count ( $users ); $i ++) {
		fputcsv ( $fh, get_object_vars ( $users [$i] ) );
	}
	fclose ( $fh );
}
function readUsers() {
	if (! file_exists ( 'users.csv' )) {
		setupDefaultUsers ();
	}
	$users = array ();
	$fh = fopen ( 'users.csv', 'r' ) or die ( "Can't open file" );
	$keys = fgetcsv ( $fh );
	while ( ($vals = fgetcsv ( $fh )) != FALSE ) {
		if (count ( $vals ) > 1) {
			$u = new User ();
			for($k = 0; $k < count ( $vals ); $k ++) {
				$u->$keys [$k] = $vals [$k];
			}
			$users [] = $u;
		}
	}
	fclose ( $fh );
	return $users;
}
function userHashByName($users, $full_name) {
	$res = '';
	foreach ( $users as $u ) {
		if ($u->full_name == $full_name) {
			$res = $u->hash;
		}
	}
	return $res;
}
?>
