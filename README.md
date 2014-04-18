php_movie_center
================

This plugin is written by HTML5 , Bootstrap , PHP And themoviedb API.

It can help you to share you favourite FULL-HD video to your friends seamlessly. This is multiple-device-friendly, worked on PC*, iPhone**, iPad**, Android***.


*PC with chrome can only view external substitle


**MacOS/iPhone/iPad with safari can only view the internal susbtitle of the MP4.


***Tested android version >4.3 and chrome can view the subtitle, but not for full screen. It is the mobile chrome limitation.

It is a PHP plugin with tested PHP_version = 5.2, English AND Chinese ONLY

One of the class is based on the source code of https://github.com/glamorous/TMDb-PHP-API. Big thanks to @Jonas De Smet providing such good php API for accessing themoviedb api. It saved me a lot of times.

WHAT IS IT?
================
It is a light online MP4 movie library with automatically serach:

1. the movie information
2. the youtbue trailer.

No MySQL is needed.
In order to search smartly.

Your mp4 formate should be 

"{movie_name}.{year}.{resolution}.{anything}.mp4"

REQUIREMENT 
================
1. PHP >= 5.2
2. Chrome ( Window platform)
3. Safari ( MAC OSX / IPHONE / IPAD)


REQUIREMENT (optional)
================

(Strongly recommand although there is an api key which is for testing) 
Register your api key http://www.themoviedb.org/

1. Register your the movie db account
2. Go to home page http://www.themoviedb.org/
3. Click on the top-right-hand side "account"
4. Click on the left sidebar "API"
5. Click Generate 
6. Place it in /config/Config.php  $themoviedbapi


INSTALLATION
================
1. Download the zip from the right-hand side (on git)
2. Move/upload the all files to your PHP server root say ( server_root/ ) and set the permission to 755
3. Create a "share" folder on (server_root/)
4. Create a "mp4" folder on (server_root/share/)
5. Create a "sub" folder on (server_root/share/sub/)
6. Create a "vtt" folder on (server_root/share/sub/vtt)
7. Use text editor(notepad/sublime,etc) to edit the /config/Config.php to suit you needs ( There are some comments you can read in that php). Most likely, you will only need to change the server name, server logo, themoviedb_api key.
8. access to your server (server_root/php_movie_center/index.php)
9. Place your favourite {mp4_name}.mp4 (you can convert it from mkv without re-encoding) to the "mp4" folder alone with the {mp4_name}.srt in "mp4/sub/" folder .
10. Try to have fun with this plugin and done!


OPTIONAL
================
you can enable login in /config/Config.php by changing $need_login
ie.
public static $need_login = true

and also with your account name in $users



