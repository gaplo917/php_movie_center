<?php   include (dirname(__FILE__).'/nav_bar.php'); ?>
      <body>
  <div class="container">
      <div class="jumbotron welcom-message">
        <h1>Welcom to <?php echo Config::$server_name ?>!</h1>
        <p>This webpage is designed for iDevice such as iPhone, iPad and Mac OSX , and Window desktop Computer to stream the high quality movie online. </p>
        <p> All movie are used for testing.</p>
        <p>
            <li class="dropdown list-unstyled">
              <a href="#" class="dropdown-toggle btn btn-lg btn-primary" data-toggle="dropdown">Try Now! <b class="caret"></b></a>
              <ul id='movie-menu' class="dropdown-menu">
              		<?php echo  $movie_list; ?>
              </ul>
            </li>
        </p>
      </div>
      <div class="row">
      	<div class="col-md-4">
      		<h2>Multi devices and browser support</h2>
      		<p>
      			This page is written by PHP, HTML5 and JQuery and tested with multi-device environment.
      		</p>
      	</div>
      	<div class="col-md-4">
      		<h2>Movie Database Engine embeded</h2>
      		<p>
      			This Engine can automatically find corresponding movie information from online database (<a target='_blank' href='http://www.themoviedb.org'>The Movie DB</a>).
      		</p>
      	</div>
      	<div class="col-md-4">
      		<h2>Smartphone online streaming</h2>
      		<p>iDevice with the lastest iOS/OSX can play movies with subtitle while the others platfrom can play movies without subtitle.</p>
      	</div>
      </div>
      </div>
  </body>
