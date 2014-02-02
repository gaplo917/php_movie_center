<?php 

Class Subtitle{
	private $subtitle;
	private $subtitle_path;
	public function __construct($file_path){
		if(file_exists($file_path)){
			$this->subtitle = file_get_contents($file_path);
	    	$this->subtitle_path = $file_path;
		}
		else{
			// ...
			$this->subtitle = null;
			$this->subtitle_path = null;
		}
	}
	public function convertToVttFromSrt(){
		if($this->subtitle == null)
			return;
		$this->subtitle = preg_replace_callback('/([0-9][0-9]:[0-9][0-9]:[0-9][0-9].[0-9][0-9][0-9])/',array(&$this, "replaceCommaToDot"),$this->subtitle);
	    $this->subtitle = "WEBVTT\n\n".$this->subtitle;
	}
	public function save(){
		if($this->subtitle == null)
			return;
		$file_path_arr = explode('/', $this->subtitle_path);
		$path = '';
		for ($i =0; $i < sizeof($file_path_arr)-1; $i++) {
			$path .= $file_path_arr[$i].'/';
		}
		$file_name_extension = $file_path_arr[sizeof($file_path_arr)-1];
		$file_name_extension_arr = explode('.', $file_name_extension);
		$file_name = $file_name_extension_arr[0];
		file_put_contents($path."vtt/{$file_name}.vtt",$this->subtitle);
	}
	private function replaceCommaToDot($matches) {
            return str_replace(',', '.', $matches[0]);
    }
}

 ?>
