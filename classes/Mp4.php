<?php 
include dirname(__FILE__)."/FilesSystem.php";
Class Mp4 extends FilesSystem{

	function __construct($dir){
		parent::__construct($dir);
	}
	public function getMp4List(){
		return parent::getList("mp4");
	}
}

 ?>