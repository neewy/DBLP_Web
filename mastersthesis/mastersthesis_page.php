<?php session_start();
	$title = $_POST['paramName'][1];
	//$fields = array("mdate", "key", "title", "pages", "year", "url", "ee", "school", "author");
    //include('../dbconnection.inc.php');
		
	/*$query = "SELECT
      mastersthesis.title,
      mastersthesis.key,
	  mastersthesis.mdate,
	  mastersthesis.pages,
	  mastersthesis.year,
	  mastersthesis.url,
	  mastersthesis.ee,
	  mastersthesis.school
	FROM 
	  dblp.mastersthesis
	WHERE 
	  mastersthesis.title LIKE '$title';";*/

    echo("<div id=\"cards_wrapper\">");
if(isset($_SESSION['login_user']) AND isset($_SESSION['role'])) {
        if ($_SESSION['role'] === "admin" OR $_SESSION['role'] === "moderator") {
            echo("<a class=\"addRecord add_record\"><i class=\"fa fa-plus addRecordIcon add_record\"></i></a>");
        }
}
	echo ('<div class="pure-u-1-2 single_c new_record" style="display: none">');
    echo ("<p class=\"key\" style=\"display: none\"></p>");
	echo ("<h2 class=\"title\" style=\"display: none\"></h2>");
	echo ("<h3 style=\"display: none\">Authors</h3>");
	echo ("<ul style=\"display: none\" class=\"authors\">");
	echo ('<li style=\"display: none\" class="author_1"></li>');
	echo ("</ul>");
	echo ("<h3 style=\"display: none\">Date modified</h3>");
	echo ("<p style=\"display: none\" class=\"mdate\"></p>");
	echo ("<h3 style=\"display: none\">Pages</h3>");
	echo ("<p style=\"display: none\" class=\"pages\"></p>");
	echo ("<h3 style=\"display: none\">Year</h3>");
	echo ("<p style=\"display: none\" class=\"year\"></p>");
	echo ("<h3 style=\"display: none\">DBLP url</h3>");
	echo ("<p style=\"display: none\" class=\"url\"></p>");
	echo ("<h3 style=\"display: none\">DOI url</h3>");
	echo ("<p style=\"display: none\" class=\"ee\"></p>");
    echo ("<h3 style=\"display: none\">School</h3>"); //school
	echo ("<p style=\"display: none\" class=\"school\"></p>"); //school
	echo ("</div>");

	$st="select * from mastersthesis where title = ;$title; 1 0\n";
	include('../socket_conn.inc.php');
	foreach ($finalArray as $key => $value) {
		echo ('<div class="pure-u-1-2 single_c">');
		$arraySock = json_decode($value, true);
		if (array_key_exists('title', $arraySock)){
			echo ("<h2 class=\"title\">$arraySock[title]</h2>");
		} else {
			echo ("<h2 class=\"title\" style=\"display: none\"></h2>");
		}

		if (array_key_exists('key', $arraySock)){
			echo ("<p class=\"key\" style=\"display: none\">$arraySock[key]</p>");
			if ((array_key_exists('authors', $arraySock)) AND count($arraySock[authors]) === 0) {
				echo ("<h3 style=\"display: none\">Authors</h3>");
				echo ("<ul style=\"display: none\" class=\"authors\">");
				echo ('<li style=\"display: none\" class="author_1"></li>\n');
				echo ("</ul>");
			} else {
				echo ("<h3>Authors</h3>");
				echo ("<ul class=\"authors\">");
				$num = 1;
				foreach ($arraySock[authors] as $key1 => $value1) {
					echo ("<li class=\"author_$num\">$value1</li>\n");
					$num++;
				}
				echo ("</ul>");
			}
		}

		if (array_key_exists('mdate', $arraySock)){
			echo ("<h3>Date modified</h3>");
			echo ("<p class=\"mdate\">$arraySock[mdate]</p>");
		} else {
			echo ("<h3 style=\"display: none\">Date modified</h3>");
			echo ("<p style=\"display: none\" class=\"mdate\"></p>");
		}

		if (array_key_exists('pages', $arraySock)){
			echo ("<h3>Pages</h3>");
			echo ("<p class=\"pages\">$arraySock[pages]</p>");
		} else {
			echo ("<h3 style=\"display: none\">Pages</h3>");
			echo ("<p style=\"display: none\" class=\"pages\"></p>");
		}

		if (array_key_exists('year', $arraySock)){
			echo ("<h3>Year</h3>");
			echo ("<p class=\"year\">$arraySock[year]</p>");
		} else {
			echo ("<h3 style=\"display: none\">Year</h3>");
			echo ("<p style=\"display: none\" class=\"year\"></p>");
		}

		if (array_key_exists('url', $arraySock)){
			echo ("<h3>DBLP url</h3>");
			echo ("<p class=\"url\"><a href=\"http://dblp.uni-trier.de/$arraySock[url]\">$arraySock[url]</a></p>");
		} else  {
			echo ("<h3 style=\"display: none\">DBLP url</h3>");
			echo ("<p style=\"display: none\" class=\"url\"></p>");
		}

		if (array_key_exists('ee', $arraySock)){
			echo ("<h3>DOI url</h3>");
			echo ("<p class=\"ee\"><a href=\"$arraySock[ee]\">$arraySock[ee]</a></p>");
		} else {
			echo ("<h3 style=\"display: none\">DOI url</h3>");
			echo ("<p style=\"display: none\" class=\"ee\"></p>");
		}

		if (array_key_exists('school', $arraySock)){
			echo ("<h3>School</h3>");
			echo ("<p class=\"school\">$arraySock[school]</p>");
		} else  {
			echo ("<h3 style=\"display: none\">School</h3>");
			echo ("<p style=\"display: none\" class=\"school\"></p>");
		}

		if(isset($_SESSION['login_user']) AND isset($_SESSION['role'])) {
			if ($_SESSION['role'] === "admin" OR $_SESSION['role'] === "moderator") {
				echo '<p><a class="btnflip pure-button pure-button-primary"><i class="fa fa-expand"></i> Edit</a></p>';
			}
		}

		echo "</div>";
	}

    echo("</div>");
	echo("<a href=\"#\" class=\"myButton\">Back</a>");
    echo("<script type=\"text/javascript\" src=\"js/flippant.js\"></script>");
	echo("<script type=\"text/javascript\" src=\"js/browsery_mastersthesis.js\"></script>");
	session_write_close();
	//pg_close($d);
?>

