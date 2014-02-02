<?php 

class Config{

	// The API key from https://www.themoviedb.org , I strongly advise you to register one for youself
	// http://www.themoviedb.org/
	public static $themoviedb_api = "65f9941e65bec9b357a068448c3ab072";

	// The welcome mession will show the server name in ( view/home.php )
	public static $server_name = "Someone's Server";

	// The Top-left hand side of the system logo
	public static $server_logo = "G";

	// The Share folder ( default is the foler next to php_movie_center folder and named share)
	public static $share_folder = '../share';

	// The Mp4 folder ( default is the foler in share )
	public static $mp4_folder= "../share/mp4";

	/* The Subtitle folder for Mp4 ( default is the foler in mp4 )
	*	the folder to store the subtitle .srt
	*	System will identify by using the {mp4name}.srt
	*  	And automatically generate .vtt for Window Desktop 
	*  	iDevice (iOS,OSX) will not generate .vtt
	*/
	public static $subtitle_folder = "../share/mp4/sub";

	/* 	The WEBVTT folder for online streaming ( default is the foler in sub )
	*	the folder to store the subtitle (html5 version ) WEBVTT (.vtt)
	*	System will automatically generate from .srt to .vtt , just place a empty folder
	*/
	public static $vtt_folder = "../share/mp4/sub/vtt";

	// Do your system require login ( true / false )
	public static $need_login = false;

	// Maximum login time
	public static $max_login_attempt = 5;

	/* change it to your own account and password
	*	"name" => "password"
	*/
	public static $users = array(
									"admin"=>"password",
									"hkepc"=>"hkepc",
									"asdgasdgasdfaawset"=>"awegwaefawegaweg",
									"eawgawegawegawsegawse"=>"aweghwaegawegawegwaeg"
									);


	public static function login($name = 'undefined',$pwd = 'undefined'){
		if(empty($name) || empty($pwd))
			return false;
		return (self::$users[$name] == $pwd)?true:false;
	}

}


 ?>