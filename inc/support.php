<?php

require_once "assets/passwordLib.php";

class Database extends PDO {
	public function __construct() {
		parent::__construct ( "sqlite: ingredients.db" );
	}

	public function placeIngredientIntoDB( $ingredient ){
		addIngredient($ingredient->$name, $ingredient->$description, $ingredient->$image );
	}

	public function addIngredient($name, $desc, $image ){
	$sql = "INSERT INTO ingredients (name, description, image) VALUES ('$name','$desc','$image')";
	$status = $this->exec($sql);
			if($status === FALSE){
				echo $sql;
				echo '<pre class="bg-danger">';
				print_r ( $this->errorInfo () );
				echo '</pre>';
			}
	}

	public function addComment($page, $comment, $user, $timeof ){
	$sql = "INSERT INTO comments (page, comment, user, timeof) VALUES ('$page','$comment','$user','$timeof')";
	$status = $this->exec($sql);
			if($status === FALSE){
				echo $sql;
				echo '<pre class="bg-danger">';
				print_r ( $this->errorInfo () );
				echo '</pre>';
			}
	}

	function getComments($page){
		$allcomments = array();

		// TODO: Fix this so it goes over each comment that maches the page then
		// makes it into a comment object and then places that object into a array

		$sql = "SELECT comment, user, timeof FROM comments WHERE page LIKE '%$page%'";
    foreach ($this->query($sql) as $row) {
				$comment = new Comment($row['comment'], $row['user'], $row['timeof']);
				array_push($allcomments, $comment);
    }
		return $allcomments;


		//
		//
		// $sql = "SELECT comment FROM comments WHERE page='$page'";
		//
		// $com = $this->query($sql);
		//
		// if ($com === FALSE) {
		// 	 echo $sql;
		// 	 echo '<pre class="bg-danger">';
		// 	 print_r ( $this->errorInfo () );
		// 	 echo '</pre>';
		// 	 return NULL;
		//  }
		//
		// $sql = "SELECT user FROM comments WHERE page LIKE '%$page%'";
		// $u = $this->query($sql);
		// if ($u === FALSE) {
		// 	 echo $sql;
		// 	 echo '<pre class="bg-danger">';
		// 	 print_r ( $this->errorInfo () );
		// 	 echo '</pre>';
		// 	 return NULL;
		// }
		//
		// $sql = "SELECT timeof FROM comments WHERE page LIKE '%$page%'";
		// $t = $this->query($sql);
		// if ($t === FALSE) {
		// 	 echo $sql;
		// 	 echo '<pre class="bg-danger">';
		// 	 print_r ( $this->errorInfo () );
		// 	 echo '</pre>';
		// 	 return NULL;
		// }
		//
		// $comment = new Comment($com->fetchColumn(), $u->fetchColumn(), $t->fetchColumn());
		//
		// return $comment;
		
		}

		function createTableComments(){
			dropTableByName("comments");

			$sql = "CREATE TABLE comments (
						page varchar(50),
						comment varchar(100000),
						user varchar(50),
						timeof varchar(100))";
			createTableGeneric($sql);
		}

	function findIngredient($name){

		$u = new Ingredient ();

		$u->name = $name;

		$sql = "SELECT description FROM ingredients WHERE name LIKE '%$name%'";

		$des = $this->query($sql);

		if ($des === FALSE) {
			 echo $sql;
			 echo '<pre class="bg-danger">';
			 print_r ( $this->errorInfo () );
			 echo '</pre>';
			 return NULL;
		 }

		$u->description = $des->fetchColumn();

		$sql = "SELECT image FROM ingredients WHERE name LIKE '%$name%'";

		$img = $this->query($sql);

		if ($img === FALSE) {
			 // Only doing this for class. Would never do this in real life
			 echo $sql;
			 echo '<pre class="bg-danger">';
			 print_r ( $this->errorInfo () );
			 echo '</pre>';
			 return NULL;
		 }

		$u->image = $img->fetchColumn();

		return $u;
}

	function createTableIngredients(){
		dropTableByName("ingredients");

		$sql = "CREATE TABLE ingredients (
					name varchar(50),
					description varchar(100000),
					image varchar(50))";
		createTableGeneric($sql);
	}


}

class Comment {
	public $commentText = "";
	public $user = "";
	public $time = "";

	function __construct($commentText="",$user="",$time=""){
		$this->commentText = $commentText;
		$this->user = $user;
		$this->time = $time;
	}

	function __toString(){
		return "User: " . (string)$this->user . " at " . (string)$this->time . "<br>" . (string)$this->commentText ;
		// return "why isnt this working?";
		// return (string)$this->time;
		//return $this->time;
	}

}

function makeNewComment($com, $u, $t) {
	$c = new Comment ();
	$c->commentText = $com;
	$c->user = $u;
	$c->time = $t;

	return $c;
}

function dropTableByName($tname) {
	global $db;
	$sql = "DROP TABLE IF EXISTS $tname";
	$status = $db->exec ( $sql );
	if ($status === FALSE) {
		echo $sql;
		echo '<pre class="bg-danger">';
		print_r ( $db->errorInfo () );
		echo '</pre>';
	}
}

function createTableGeneric($sql) {
 global $db;
 $status = $db->exec ( $sql );
 if ($status === FALSE) {
	 	echo $sql;
		echo '<pre class="bg-danger">';
		print_r ( $db->errorInfo () );
		echo '</pre>';
 }
}

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
	$users [$i ++] = makeNewUser ( 'ct310', '$2a$10$AoWRyJ/EvpnVfchrezeTKuzJBYBomjiG3AszuFw2mvWAvJf2APojO', 'ct310@cs.colostate.edu' );
	$users [$i ++] = makeNewUser ( 'fred', '$2a$10$k3YGRsJVAe8b0GiZ5hIxzeGwH11Wsut5MIS8JT89eF.UuyiKIhp.W', 'ct310@cs.colostate.edu' );
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
	public $description; /* Users last name */
	public $image; /* First then last name with space */


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
            leek developed from the Anglo-Saxon word leac. Two closely
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
