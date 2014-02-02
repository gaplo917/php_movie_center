
<!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./"><span class="audio-wide text-l"><?php echo Config::$server_logo; ?>   </span><span class="text-xs">Movie Center</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php echo (preg_match('/(home)/',$path))?'active':''; ?>"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Home</a></li>
            <li class="<?php echo (preg_match('/(contact)/',$path))?'active':''; ?>"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?view=contact">Contact</a></li>
            <li class="dropdown <?php echo (preg_match('/(movie)/',$path))?'active':''; ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movie Menu <b class="caret"></b></a>
              <ul id='movie-menu' class="dropdown-menu">
              		 <?php 
			foreach ($GLOBALS['Mp4']->getMp4List() as $mp4) :
		 		$mp4_html = urlencode($mp4);
		 		$movie_info = Movie::praseMovieNameAndYear($mp4);
		 		$movie_list .=  "<li><a href='{$_SERVER['SCRIPT_NAME']}?play={$mp4_html}'>{$movie_info['name']}- {$movie_info['year']} - ({$movie_info['quality']})</a></li>";
				echo "<li><a href='{$_SERVER['SCRIPT_NAME']}?play={$mp4_html}'>{$movie_info['name']}- {$movie_info['year']} - ({$movie_info['quality']})</a></li>";
			endforeach;
		  ?>
                <li class="divider"></li>
                <li class="dropdown-header">推介</li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class=""><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?action=logout">
            <?php echo ($GLOBALS['session_manager']->getSessionVar('status')=='logged_in')?$GLOBALS['session_manager']->getSessionVar('name').", Logout":"Login"; ?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>