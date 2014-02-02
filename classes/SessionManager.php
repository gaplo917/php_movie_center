<?php 

class SessionManager{


	function __construct(){
		session_start();
	}
	public function setSessionVar($var,$value){
		$_SESSION[$var] = $value;
	}
	public function getSessionVar($var){
		return $_SESSION[$var];
	}
	public function destorySession($var = NULL){
		if($var == NULL){
			foreach ($_SESSION as $key=>$value) {
				unset($_SESSION[$key]);
			}
		}
		else{
			unset($_SESSION[$var]);
		}
	}
	public function setFailAttempt(){
		if(isset($_SESSION['failure'])){
		 $_SESSION['failure'] = $_SESSION['failure']+1;
		}
		else{
			$_SESSION['failure'] = 0;
		}
	}
	public function getFailAttempt(){
		return $_SESSION['failure'];
	}
}
 ?>
