<?php
require_once ("ingredient.php");
class Database extends PDO {
	public function __construct() {
		parent::__construct ( "sqlite:" . __DIR__ . "/../music2.db" );
	}
	function getNumberOfAlbums() {
		$album_num = $this->query ( "SELECT count(*)  FROM album" );
		return $album_num->fetchColumn ();
	}
	/**
	 * Functions used by the select page to sort full music database
	 */
	function getAlbumsByField($field, $num_returned = 25, $offset = 0) {
		$sql = "SELECT album_id, artist_id, title, year, rank, artist_name AS artist
		        FROM album NATURAL JOIN artist
	           ORDER BY $field ASC LIMIT $num_returned OFFSET $offset";
		$result = $this->query ( $sql );
		if ($result === FALSE) {
			// Only doing this for class. Would never do this in real life
			echo '<pre class="bg-danger">';
			print_r ( $this->errorInfo () );
			echo '</pre>';
			return array ();
		}
		$albums = array ();
		foreach ( $result as $row ) {
			$albums [] = Album::getAlbumFromRow ( $row );
		}
		return $albums;
	}
	/**
	 * Functions needed for the search example *
	 */
	function getNumberOfResults($query_term) {
		$query_term = SQLite3::escapeString ( $query_term );
		$sql = "SELECT count(*) FROM album NATURAL JOIN artist
				WHERE (title LIKE '%$query_term%' OR artist_name LIKE '%$query_term%' OR year = '$query_term')";
		// echo "<p>$sql</p>";
		$result = $this->query ( $sql );
		return $result->fetchColumn ();
	}
	function searchForResultsAndSort($query_term, $sort_col = "rank", $num_returned = 25, $offset = 0) {
		$query_term = SQLite3::escapeString ( $query_term );
		switch ($sort_col) {
			case "rank" :
				$sort_col = "rank";
				$sec_sort = "title";
				break;
			case "year" :
				$sort_col = "year";
				$sec_sort = "rank";
				break;
			case "artist" :
				$sort_col = "artist";
				$sec_sort = "rank";
				break;
		}
		$sql = "SELECT album_id, artist_id, title, year, rank, artist_name AS artist
					FROM album NATURAL JOIN artist
					WHERE (title LIKE '%$query_term%' OR artist LIKE '%$query_term%' OR year = '$query_term')
					ORDER BY $sort_col ASC, $sec_sort ASC
					LIMIT $num_returned OFFSET $offset";
		$result = $this->query ( $sql );
		if ($result === FALSE) {
			echo $sql;
			echo '<pre class="bg-danger">';
			print_r ( $this->errorInfo () );
			echo '</pre>';
			return array ();
		}
		$albums = array ();
		foreach ( $result as $row ) {
			$albums [] = Album::getAlbumFromRow ( $row );
		}
		return $albums;
	}
	/*
	 * Functions used in the update data example
	 */
	function getAlbumDetails($id) {
		$sql = "SELECT album_id, artist_id, title, year, rank, artist_name AS artist
					FROM album NATURAL JOIN artist WHERE album_id = $id";
		$result = $this->query ( $sql );
		if ($result === FALSE) {
			// Only doing this for class. Would never do this in real life
			echo $sql;
			echo '<pre class="bg-danger">';
			print_r ( $this->errorInfo () );
			echo '</pre>';
			return NULL;
		}
		return Album::getAlbumFromRow ( $result->fetch () );
	}
	function updateArtist($artist) {
		$sql = "UPDATE artist SET artist_name= ? WHERE artist_id = ?";
		$stm = $this->prepare ( $sql );
		return $stm->execute ( array (
				$artist->name,
				$artist->id
		) );
	}
	function updateAlbum($album) {
		$sql = "UPDATE album SET title = :title, rank = :rank, year = :year,
				artist_id = :artist_id WHERE album_id = :id";
		$stm = $this->prepare ( $sql );
		return $stm->execute ( array (
				":title" => $album->title,
				":rank" => $album->rank,
				":year" => $album->year,
				":artist_id" => $album->artist->id,
				":id" => $album->id
		) );
	}

	/*
	 * Function used to support deletion of an album
	 */
	function deleteAlbum($album) {
		// Anyone see this issues with the way I am deleting?
		$sql = "DELETE FROM album WHERE album_id = $album";
		if ($this->exec ( $sql ) === FALSE) {
			echo '<pre class="bg-danger">';
			print_r ( $this->errorInfo () );
			echo '</pre>';
			return FALSE;
		}
		return TRUE;
	}
}
