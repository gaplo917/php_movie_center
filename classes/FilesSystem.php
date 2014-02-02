<?php
abstract Class FilesSystem {
	private $dir;
	function __construct($dir){
		$this->dir = $dir;
	}
	function getList($type = null){
		$files = scandir($this->dir);
		if($type == null){
			return $files;
		}
		else{
			$type_list = array();
			foreach ($files as $file){
				$file_info = explode('.', $file);
				$file_type = $file_info[sizeof($file_info)-1];
				if(strtolower($file_type) == $type){
					array_push($type_list, $file);
				}
			}
			return $type_list;
		}
	}
}
?>
