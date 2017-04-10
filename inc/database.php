<?php
require_once ("ingredient.php");

class Database extends PDO {
	public function __construct() {
		parent::__construct ( "sqlite:../databases/ingredients.db" );
	}

	public function addIngredient($name, $desc, $image ){
	$sql = "INSERT INTO ingredients (name, description, image) VALUES ('$name','$desc','$image')";
	}

}
	function findIngredient($name){
    $sql = "SELECT name, description, image FROM ingredients WHERE name LIKE '%$name%'";

    $row = $this->query ( $sql );

    return Ingredient::getIngredient($row->fetch());
  }
}
