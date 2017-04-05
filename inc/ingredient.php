<?php
class Album{
	public $name;
	public $middleText;
	public $artist;
	public $rank;
	public $id;

	public static function getAlbumFromRow($row){
		$album = new Album();
		$album->title = $row['title'];
		$album->year = $row['year'];
		$album->rank = $row['rank'];
		$album->id = $row['album_id'];
		if(isset($row['artist'])){
			$album->artist = new Artist($row['artist'], $row['artist_id']);
		}
		return $album;
	}

	function __toString(){
		return $this->title . '(' . $this->year . ')';
	}
}
