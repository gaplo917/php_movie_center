<?php   include (dirname(__FILE__).'/nav_bar.php'); ?>

      <body>
  <div class="container">
      <div class="row">
        	  <div class='col-md-7 playing-area "'>
              <ul class='nav nav-tabs' id='playing-area-tab'>
                <li class='active'><a href="#movie-area" data-toggle="tab">Movie</a></li>
                <li><a href="#movie-trailer" data-toggle="tab">Youtube Trailer</a></li>
              </ul>

              <div class="tab-content">
        <?php 




      // get the movie from url
      $mp4 = html_entity_decode($_GET['play']);

      // remove .mp4 extension
      $mp4_name = str_replace('.mp4', '', $mp4);

      // get path form config.php
      $subtitle_folder = Config::$subtitle_folder;
      $mp4_folder = Config::$mp4_folder;
      $vtt_folder = Config::$vtt_folder;

      // set the subtitle
      $subtitle = new Subtitle("{$subtitle_folder}/{$mp4_name}.srt");
      $subtitle->convertToVttFromSrt();
      $subtitle->save();

      // get the browser platform
      $browser_info = $_SERVER['HTTP_USER_AGENT'];

      // subtitle for iDevice is ready , only other platform needed subtitle
      $subtitle_enable_for_non_iDevice = (preg_match('/(Chrome)/',strtolower($browser_info)))?'':"<track src='{$vtt_folder}/{$mp4_name}.vtt' kind='subtitle' srclang='en-US' label='English' />";

echo <<<VIDEO
      <div class="tab-pane active" id="movie-area">
      <video width="100%" height="" controls='controls' >
        <source src="{$mp4_folder}/{$mp4}" type="video/mp4" >
        {$subtitle_enable_for_non_iDevice}
      Your browser does not support the video tag.
      </video>
      </div>
VIDEO;


            $mp4_html = urlencode($_GET['play']);

            $movie_info = Movie::praseMovieNameAndYear($mp4);

            //identity is it non-english , then chinese
            $movie_lang = (preg_match('/^[a-zA-Z+]+$/',$movie_info['name']))?'+official+trailer+HD+movie':'預告+官方';

            //remove  ' ' sign to '+'
            $movie_search_str = str_replace(" ", "+", $movie_info['name']);

            //remove  ',' sign to '+'
            $movie_search_str = str_replace(",", "+", $movie_search_str);

            // get the search from youtube
            $json = file_get_contents("http://gdata.youtube.com/feeds/api/videos?q={$movie_search_str}{$movie_lang}&alt=json");
            $array = json_decode($json);

            $i = 0;
            while($i < 10){
              if($array->feed->entry[$i]->{'media$group'}->{'media$content'}[0]->type != 'application/x-shockwave-flash'){
                $i++;
              }
              else 
                break;
            }
            // echo '<pre>',print_r($array->feed->entry[$i]->{'media$group'}),'</pre>';
            $url = $array->feed->entry[$i]->{'media$group'}->{'media$content'}[0]->url;

            //change the url to embedded mode in youtube
            $url = str_replace('/v/', '/embed/', $url);


echo <<< YOUTUBE
      <div class="tab-pane" id="movie-trailer">
      <iframe width="100%" height="400" src="$url" frameborder="0" allowfullscreen></iframe>
      </div>
YOUTUBE;

       ?>
               </div> <!-- tabs pane div -->
        </div>
        	<div class="col-md-5 movie-info">
        		
      		 <?php 
      			echo "<h1 class='audio-wide'>Now Playing</h2>";

      			echo "<div class=''>";
      		  	$mp4 = html_entity_decode($_GET['play']);

      		  	// prase the file name to Movie name from {name}.{year}.mp4 format
      		  	$movie_info = Movie::praseMovieNameAndYear($mp4);

      		  	// Movie name
      		  	$movie_name = $movie_info['name'];

      		  	// Movie year
      		  	$movie_year = $movie_info['year'];

      		  	// Double check for the year will number only
      		  	$movie_year = preg_match('/^[0-9]{4}$/',$movie_year)?$movie_year:NULL;

      		  	// If the movie name contain non-english character => change to chinese
      		  	$movie_lang = (preg_match('/^[a-zA-Z+]+$/',$movie_name))?'en':'zh';

      		  	$movie = new Movie($movie_name,$movie_year,$movie_lang );
      		  	if($movie->getNumberOfResult() > 0){
                //Title
          				echo "Title: {$movie->getTitle()}<br>";
          				echo ($movie->getChinaTitles()=='')?'':"中國譯名: {$movie->getChinaTitles()}<br>";
          				echo ($movie->getTaiWanTitles()=='')?'':"台灣譯名: {$movie->getTaiWanTitles()}<br>";
                //Release Date
          				echo "Released Date: {$movie->getReleaseDate()} <br>";
                //Rating
          				echo "Rating: {$movie->getVotes()}  / {$movie->getVoteCount()} Votes<br>";
                //Poster
          				echo "<a target='_blank' href='http://www.themoviedb.org/movie/{$movie->getId()}'><img src={$movie->getPoster()} class='img-responsive'></img></a><br>";
                //Actors
          				echo "Actors:<br>";
          				$actors = new Actors($movie);
          				for( $i =0 ; $i < $actors->getNumberOfActors() ; $i++){
          					if($actors->getProfilePic($i) != '' && $actors->getProfilePic($i) != NULL){
                      // print the actor with small image
          						echo "<a target='_blank' href='http://www.themoviedb.org/person/{$actors->getId($i)}'><img class='actor ' data-toggle='tooltip' data-delay='100' title='{$actors->getName($i)}' src={$actors->getProfilePic($i)}> </img></a>";
                    }
          				}
      			}
      			else{
              // if no search result
      				echo 'No Result match with Database!';
      			}
      		
      			echo "</div>"; // close div of movie-info
      		  ?>
        	</div>

      </div>
  </body>
