<?php
  require_once  dirname(__FILE__)."/config/Config.php";
	require_once  dirname(__FILE__)."/classes/Mp4.php";
	require_once  dirname(__FILE__)."/classes/Movie.php";
	require_once  dirname(__FILE__)."/classes/Actors.php";
  require_once  dirname(__FILE__)."/classes/Subtitle.php";
  require_once  dirname(__FILE__)."/classes/SessionManager.php";
  $GLOBALS['session_manager'] = new SessionManager();
	$GLOBALS['Mp4'] = new Mp4(Config::$mp4_folder);
	

 ?>
  <?php 
  // header page
  include('view/header.php');

  if(Config::$need_login){
    if( ((isset($_POST['name']) || isset($_POST['pwd'])) && Config::login($_POST['name'],$_POST['pwd'])== false) || $GLOBALS['session_manager']->getFailAttempt()>=Config::$max_login_attempt ){
        $GLOBALS['session_manager']->setFailAttempt();
        $chances = Config::$max_login_attempt - $GLOBALS['session_manager']->getFailAttempt();
        if($chances <= 0 ){
          echo "<div class='alert alert-danger text-center'>Sorry, please try again later</div>";
          exit;
        }else{
          echo "<div class='alert alert-danger text-center'>You have {$chances} times to try again</div>";
          include('view/login.php');
          include('view/footer.php');
          exit;
        }

    }
    elseif(Config::login($_POST['name'],$_POST['pwd']) == true || $GLOBALS['session_manager']->getSessionVar('status')=="logged_in"){
        if($GLOBALS['session_manager']->getSessionVar('status')!="logged_in"){
          $GLOBALS['session_manager']->setSessionVar('name',$_POST['name']);
          $GLOBALS['session_manager']->setSessionVar('status', "logged_in");
          $GLOBALS['session_manager']->setSessionVar('failure', 0);
        }
    }
    else{
          include('view/login.php');
          include('view/footer.php');
          exit;
    };

  }
      	if(isset($_GET['play'])){
          $path = 'movie';
          include('view/movie.php');
        }
        else if($_GET['view'] == 'contact'){
          $path = 'contact';
          include('view/contact.php');
        }
        else if($_GET['action'] =='logout'){
          $GLOBALS['session_manager']->destorySession();
          include('view/login.php');
        }
      	else {
          $path = 'home';
          include ('view/home.php');

        }
     // footer page
  include('view/footer.php');
   ?>
  