<?php

require_once "passwordLib.php";

class User {
	public $username = 'username'; /* Users first name */
	public $password = ''; /* Users last name */
	public $email = ''; /* First then last name with space */
}
function makeNewUser($first, $pass, $h) {
	$u = new User ();
	$u->userName = $first;
	$u->hash = $pass;
	$u->email = $h;
	
	return $u;
}
function setupDefaultUsers() {
	$users = array ();
	$i = 0;
	$users [$i ++] = makeNewUser ( 'Bobby', '$2a$07$AGlkyWHt4K5H8Cv7ekuTeOJPUKZyyY9h9E./MdjNrYjCRIlYgTpym', 'bobby20@comcast.net' );
	$users [$i ++] = makeNewUser ( 'Kyle', '$2a$10$FxWxytnHKvq598xKdP.aYOVcOLdfCXszevDYlcSmdB0FStPbcY/JW', 'kylejodin@gmail.com' );
	$users [$i ++] = makeNewUser ( 'ct310', '$2a$07$xfB0CelpA4myJ5EOfb7KT.57k83KPfHaOTsH22.di8VMPCtqh5heC', 'nspatil@colostate.edu' );
	writeUsers ( $users );
}
function writeUsers($users) {
	$fh = fopen ( 'databases/users.csv', 'w+' ) or die ( "Can't open file" );
	fputcsv ( $fh, array_keys ( get_object_vars ( $users [0] ) ) );
	for($i = 0; $i < count ( $users ); $i ++) {
		fputcsv ( $fh, get_object_vars ( $users [$i] ) );
	}
	fclose ( $fh );
}
function readUsers() {
	if (! file_exists ( 'databases/users.csv' )) {
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
