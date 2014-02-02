<?php 

class Actors{
	private $actors;

	function __construct(Movie $movie){
		$this->actors = $movie->getActors();
	}
	public function getNumberOfActors(){
		return sizeof($this->actors['cast']);
	}
	public function getId($pos = 0){
		return $this->actors['cast'][$pos]['id'];
	}
	public function getName($pos = 0){
		return $this->actors['cast'][$pos]['name'];
	}
	public function getProfilePic($pos = 0 , $size = 'XS'){
		if(!isset($this->actors['cast'][$pos]['profile_path']))
			return '';
		switch ($size){
			case 'XS':
				return "http://image.tmdb.org/t/p/w92".$this->actors['cast'][$pos]['profile_path'];
			case 'S':
				return "http://image.tmdb.org/t/p/w185".$this->actors['cast'][$pos]['profile_path'];
			case 'M':
				return "http://image.tmdb.org/t/p/w342".$this->actors['cast'][$pos]['profile_path'];
			case 'L':
				return "http://image.tmdb.org/t/p/w500".$this->actors['cast'][$pos]['profile_path'];
			case 'XL':
				return "http://image.tmdb.org/t/p/original".$this->actors['cast'][$pos]['profile_path'];
		}
		// If the size input is wrong , output Middle size
		return "http://image.tmdb.org/t/p/w92".$this->actors['cast'][$pos]['profile_path'];
	}
	public function getCharacter($pos = 0){
		return $this->actors['cast'][$pos]['character'];
	}
}

 ?>