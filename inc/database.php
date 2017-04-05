<?php
require_once ("ingredient.php");
class Database extends PDO {
	public function __construct() {
		parent::__construct ( "sqlite:" . __DIR__ . "/../ingredients.db" );
	}
	function findIngredient($name){
    
  }
}
