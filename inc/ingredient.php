<?php
class Ingredient{
	public $name;
	public $middleText;
	public $pictureFile;
	public $comments;

	public static function getIngredient($row){
		$ingredient = new Ingredient();
		$ingredient->name = $row['name'];
		$ingredient->middleText = $row['text'];
		$ingredient->pictureFile = $row['picture'];
		$ingredient->comments = $row['comment'];

		return $ingredient;
	}

}
