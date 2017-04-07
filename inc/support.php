<?php

require_once "assets/passwordLib.php";

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
	$users [$i ++] = makeNewUser ( 'cust1', '$2a$10$tpYldeemy1UVLM.XySiBuuIFi6gOydwhvho93Gs8LRpB4G3npPH0u', 'kylejodin@gmail.com' );
	$users [$i ++] = makeNewUser ( 'cust2', '$2a$10$.GR2dlFJU.YxNBphzm6gyeVVy9Jw358La/i.3JVI60Ctl0c6Y8uYq', 'bobby20@comcast.net' );
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
	$fh = fopen ( 'databases/users.csv', 'r' ) or die ( "Can't open file" );
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

class Ingredient {
	public $name = 'name'; /* Users first name */
	public $description = ''; /* Users last name */
	public $image = ''; /* First then last name with space */
}
function makeNewIng($first, $des, $img) {
	$u = new Ingredient ();
	$u->name = $first;
	$u->description = $des;
	$u->image = $img;
	
	return $u;
}

function setupDefaultIngredients() {
	$ings = array ();
	$i = 0;
	$ings [$i ++] = makeNewIng ( 'Cabage', 'Cabbage or headed cabbage (comprising several cultivars of Brassica 
            oleracea) is a leafy green or purple biennial plant, grown as an 
            annual vegetable crop for its dense-leaved heads. It is descended 
            from the wild cabbage, B. oleracea var. oleracea, and is closely 
            related to broccoli and cauliflower (var. botrytis), Brussels 
            sprouts (var. gemmifera) and savoy cabbage (var. sabauda) which are 
            sometimes called cole crops. Cabbage heads generally range from 0.5 
            to 4 kilograms (1 to 9 lb), and can be green, purple and white. 
            Smooth-leafed firm-headed green cabbages are the most common, with 
            smooth-leafed red and crinkle-leafed savoy cabbages of both colors 
            seen more rarely. It is a multi-layered vegetable. Under conditions 
            of long sunlit days such as are found at high northern latitudes in 
            summer, cabbages can grow much larger.', 'Cabbage.jpg' );
	$ings [$i ++] = makeNewIng ( 'Eggplant', 'Eggplant (Solanum melongena), or aubergine, is a species of 
            nightshade grown for its edible fruit. Eggplant is the common name 
            in North America and Australia, but British English uses the French 
            word aubergine. It is known in South Asia, Southeast Asia, and South 
            Africa as brinjal.', 'Eggplant.jpg' );
	$ings [$i ++] = makeNewIng ( 'Leek', 'The leek is a vegetable, a cultivar of Allium ampeloprasum, the 
            broadleaf wild leek. The edible part of the plant is a bundle of 
            leaf sheaths that is sometimes erroneously called a stem or stalk. 
            Historically, many scientific names were used for leeks, but they 
            are now all treated as cultivars of A. ampeloprasum. The name 
            \'leek\' developed from the Anglo-Saxon word leac. Two closely 
            related vegetables, elephant garlic and kurrat, are also cultivars 
            of A. ampeloprasum, although different in their uses as food. The 
            onion and garlic are also related, being other species of the genus 
            Allium.', 'Leek.jpg' );
	writeIngredients ( $ings );
}

function writeIngredients($ings) {
	$fh = fopen ( 'databases/ingredients.csv', 'w+' ) or die ( "Can't open file" );
	fputcsv ( $fh, array_keys ( get_object_vars ( $ings [0] ) ) );
	for($i = 0; $i < count ( $ings ); $i ++) {
		fputcsv ( $fh, get_object_vars ( $ings [$i] ) );
	}
	fclose ( $fh );
}

function readIngredients() {
	if (! file_exists ( 'databases/ingredients.csv' )) {
		setupDefaultIngredients ();
	}
	$ings = array ();
	$fh = fopen ( 'databases/ingredients.csv', 'r' ) or die ( "Can't open file" );
	$keys = fgetcsv ( $fh );
	while ( ($vals = fgetcsv ( $fh )) != FALSE ) {
		if (count ( $vals ) > 1) {
			$u = new Ingredient ();
			for($k = 0; $k < count ( $vals ); $k ++) {
				$u->$keys [$k] = $vals [$k];
			}
			$ings [] = $u;
		}
	}
	fclose ( $fh );
	return $ings;
}

?>
