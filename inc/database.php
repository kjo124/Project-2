<?php
require_once ("ingredient.php");
class Database extends PDO {
	public function __construct() {
		parent::__construct ( "sqlite:" . __DIR__ . "/../ingredients.db" );
	}
	function findIngredient($name){
    $sql = "SELECT row FROM ingredients WHERE name LIKE '%$name%'";

    $row = $this->query ( $sql );
    
    Ingredient::getIngredient($row);
  }
}
