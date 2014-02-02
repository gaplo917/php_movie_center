<?php 

include dirname(__FILE__).'/TMDb.php';
require_once dirname(__FILE__).'/../config/Config.php';
Class Movie extends TMDb{

	// The API key from https://www.themoviedb.org
	private $api_key ;

	private $movie;
	function __construct($movie_name , $movie_year ,$movie_lang = 'en'){
		$this->api_key = Config::$themoviedb_api;
		parent::__construct($this->api_key);
		$this->movie = $this->searchMovie($movie_name,"1",true,$movie_year,$movie_lang);

	}
	public static function praseMovieNameAndYear($mp4){
		  	$mp4_arr = explode('.', $mp4);
		  	$movie_name = '';
		  	$movie_year = NULL;
		  	$movie_quality = NULL;
		  	foreach($mp4_arr as $s){
		  		if(!preg_match('/^[0-9]{4}$/',$s))
		  			$movie_name .= $s . " ";
		  		else if(preg_match('/^(720p|1080p)$/',$s)){
		  			$movie_quality = $s;
		  		}
		  		else{
		  			$movie_year = $s;
		  			break;
		  		}
		  	}
		  	foreach($mp4_arr as $s){
				if(preg_match('/(720p)/',$s)){
		  			$movie_quality = "720p";
		  		}
		  		else if(preg_match('/(1080p)/',$s)){
					$movie_quality = "1080p";
		  		}
		  	}
		 return array( 'name'=>$movie_name , 'year'=>$movie_year ,'quality'=>$movie_quality);
	}
	public function getNumberOfResult(){
		return sizeof($this->movie['results']);
	}
	public function getTitle($pos = 0,$original = true){
		return ($original)?$this->movie['results'][$pos]['original_title']:$this->movie['results'][$pos]['original_title'];
	}
	public function getChinaTitles($pos = 0){
		$titles = $this->getMovieTitles($this->getId(),'CN');
			return $titles['titles'][0]['title'];
	}
	public function getTaiWanTitles($pos = 0){
		$titles = $this->getMovieTitles($this->getId(),'TW');
			return $titles['titles'][0]['title'];
	}
	public function getAlternativeTitles($pos = 0){
			return $this->getMovieTitles($this->getId());;
	}
	public function getPoster($size = 'M',$pos=0){
		if(!isset($this->movie['results'][$pos]['poster_path']))
			return '';
		switch ($size){
			case 'XS':
				return "http://image.tmdb.org/t/p/w92".$this->movie['results'][$pos]['poster_path'];
			case 'S':
				return "http://image.tmdb.org/t/p/w185".$this->movie['results'][$pos]['poster_path'];
			case 'M':
				return "http://image.tmdb.org/t/p/w342".$this->movie['results'][$pos]['poster_path'];
			case 'L':
				return "http://image.tmdb.org/t/p/w500".$this->movie['results'][$pos]['poster_path'];
			case 'XL':
				return "http://image.tmdb.org/t/p/original".$this->movie['results'][$pos]['poster_path'];
		}
		// If the size input is wrong , output Middle size
		return "http://image.tmdb.org/t/p/w342".$this->movie['results'][$pos]['poster_path'];
	}
	public function getReleaseDate($pos = 0){
		return $this->movie['results'][$pos]['release_date'];
	}
	public function getVotes($pos = 0 ){
		return $this->movie['results'][$pos]['vote_average'];
	}
	public function getVoteCount($pos = 0){
		return $this->movie['results'][$pos]['vote_count'];
	}
	public function getId($pos = 0){
		return $this->movie['results'][$pos]['id'];
	}
	public function getActors($pos = 0){
		return $this->getMovieCast($this->getId($pos));
	}
	public function getTrailer($pos = 0){
		return $this->getMovieTrailers($this->getId($pos));
	}
	public function getBackDrops($pos = 0){
		return $this->movie['results'];
	}
}
class MovieException extends Exception{}
 ?>