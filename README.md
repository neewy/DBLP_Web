<pre>
8888888 888b    888 888b    888  .d88888b.  8888888b.   .d88888b.  888      8888888  .d8888b. 
  888   8888b   888 8888b   888 d88P" "Y88b 888   Y88b d88P" "Y88b 888        888   d88P  Y88b
  888   88888b  888 88888b  888 888     888 888    888 888     888 888        888   Y88b.     
  888   888Y88b 888 888Y88b 888 888     888 888   d88P 888     888 888        888    "Y888b.  
  888   888 Y88b888 888 Y88b888 888     888 8888888P"  888     888 888        888       "Y88b.
  888   888  Y88888 888  Y88888 888     888 888        888     888 888        888         "888
  888   888   Y8888 888   Y8888 Y88b. .d88P 888        Y88b. .d88P 888        888   Y88b  d88P
8888888 888    Y888 888    Y888  "Y88888P"  888         "Y88888P"  88888888 8888888  "Y8888P" 

888       888 8888888888 888888b.       888    888  .d88888b.  888       888      88888888888  .d88888b. 
888   o   888 888        888  "88b      888    888 d88P" "Y88b 888   o   888          888     d88P" "Y88b
888  d8b  888 888        888  .88P      888    888 888     888 888  d8b  888          888     888     888
888 d888b 888 8888888    8888888K.      8888888888 888     888 888 d888b 888          888     888     888
888d88888b888 888        888  "Y88b     888    888 888     888 888d88888b888          888     888     888
88888P Y88888 888        888    888     888    888 888     888 88888P Y88888 888888   888     888     888
8888P   Y8888 888        888   d88P     888    888 Y88b. .d88P 8888P   Y8888          888     Y88b. .d88P
888P     Y888 8888888888 8888888P"      888    888  "Y88888P"  888P     Y888          888      "Y88888P" 
</pre>

1. To run the application on your own webserver, these prerequisites should be met:
<ul>
<li>constant internet connection (for CDN's like jQuery)</li>
<li>Apache or nginx HTTP-server installed</li>
<li>PHP with version not less than 5.5 installed</li>
<li>PostgreSQL pgsql extension (that is bundled with PHP standart package) should be installed (just delete semicolumn in php.ini line -> extension=php_pgsql.dll)</li>
</ul><br>
<i>NB: it is highly recommended to use OpenServer package, available for Windows environment. You can edit its php.ini file this way: right-click the tray icon, then choose "additional" -> "configuration" -> "PHP-5.5"</i>
<br>
2. Create the database for users with provided dump.sql. It is recommended to use dbname "web", user "postgres" and password "postgres" for testing purposes.
3. Populate publication database with DBLP parser, that was made by our team -> https://github.com/BulatMukhutdinov/DMD_Java4Life
NB: Use console JAR file, it is awesome!
4. After setting up the environment, edit the dbconnection.inc.php (for publications database) and dbconnection2.inc.php (for accounts database) according to your PostgreSQL connection credentials.

OR

You can test it online at <a href="http://lolcathost.ru/">lolcathost.ru</a>
Enjoy!
