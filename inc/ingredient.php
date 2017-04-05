<?php
class Ingredient{
	public $name;
	public $middleText;
	public $pictureFile;
	public $comments;

	public static function getIngredient($row){
		$ingredient = new Album();
		$ingredient->name = $row['name'];
		$ingredient->middleText = $row['middleText'];
		$ingredient->pictureFile = $row['pictureFile'];
		$ingredient->comments = $row['comments'];
		
		return $ingredient;
	}

}
