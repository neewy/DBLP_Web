<?php session_start();
	$key = $_POST['paramName'][0];
	//$fields = array("key", "mdate", "editor", "title", "pages", "year", "address", "journal", "volume", "number", "url", "ee", "publisher", "note", "crossref", "isbn", "series");

    echo("<div id=\"cards_wrapper\">");
	if(isset($_SESSION['login_user']) AND isset($_SESSION['role'])) {
        if ($_SESSION['role'] === "admin" OR $_SESSION['role'] === "moderator") {
            echo("<a class=\"addRecord add_record\"><i class=\"fa fa-plus addRecordIcon add_record\"></i></a>");
        }
}  
	echo ('<div class="pure-u-1-3 single_c new_record" style="display: none">');
    echo ("<p class=\"key\" style=\"display: none\"></p>");
	echo ("<h2 class=\"title\" style=\"display: none\"></h2>");
	echo ("<h3 style=\"display: none\">Authors</h3>");
	echo ("<ul style=\"display: none\" class=\"authors\">");
	echo ('<li style=\"display: none\" class="author_1"></li>');
	echo ("</ul>");
	echo ("<h3 style=\"display: none\">Editor</h3>");
	echo ("<p style=\"display: none\" class=\"editor\"></p>");
	echo ("<h3 style=\"display: none\">Date modified</h3>");
	echo ("<p style=\"display: none\" class=\"mdate\"></p>");
	echo ("<h3 style=\"display: none\">Pages</h3>");
	echo ("<p style=\"display: none\" class=\"pages\"></p>");
	echo ("<h3 style=\"display: none\">Year</h3>");
	echo ("<p style=\"display: none\" class=\"year\"></p>");
    echo ("<h3 style=\"display: none\">Address</h3>"); //address
	echo ("<p style=\"display: none\" class=\"address\"></p>"); //address    
    echo ("<h3 style=\"display: none\">Journal</h3>"); //journal
	echo ("<p style=\"display: none\" class=\"journal\"></p>"); //journal
	echo ("<h3 style=\"display: none\">Volume</h3>"); //volume
	echo ("<p style=\"display: none\" class=\"volume\"></p>"); //volume
    echo ("<h3 style=\"display: none\">Number</h3>");
	echo ("<p style=\"display: none\" class=\"number\"></p>");
	echo ("<h3 style=\"display: none\">DBLP url</h3>");
	echo ("<p style=\"display: none\" class=\"url\"></p>");
	echo ("<h3 style=\"display: none\">DOI url</h3>");
	echo ("<p style=\"display: none\" class=\"ee\"></p>");
	echo ("<h3 style=\"display: none\">Publisher</h3>"); //publisher
	echo ("<p style=\"display: none\" class=\"publisher\"></p>"); //publisher
	echo ("<h3 style=\"display: none\">Note</h3>");
	echo ("<p style=\"display: none\" class=\"note\"></p>");
	echo ("<h3 style=\"display: none\">Cross-reference</h3>");
	echo ("<p style=\"display: none\" class=\"crossref\"></p>");
    echo ("<h3 style=\"display: none\">ISBN</h3>"); //isbn
	echo ("<p style=\"display: none\" class=\"isbn\"></p>"); //isbn    
    echo ("<h3 style=\"display: none\">Series</h3>"); //series
	echo ("<p style=\"display: none\" class=\"series\"></p>"); //series
	echo ("</div>");

	$st="select * from proceeding where key = ;$key; 1 0\n";
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

		if (array_key_exists('editor', $arraySock)){
			echo ("<h3>Editor</h3>");
			echo ("<p class=\"editor\">$arraySock[editor]</p>");
		} else {
			echo ("<h3 style=\"display: none\">Editor</h3>");
			echo ("<p style=\"display: none\" class=\"editor\"></p>");
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

		if (array_key_exists('address', $arraySock)){
			echo ("<h3>Address</h3>");
			echo ("<p class=\"address\">$arraySock[address]</p>");
		} else {
			echo ("<h3 style=\"display: none\">address</h3>");
			echo ("<p style=\"display: none\" class=\"address\"></p>");
		}

		if (array_key_exists('journal', $arraySock)){
			echo ("<h3>Journal</h3>");
			echo ("<p class=\"journal\">$arraySock[journal]</p>");
		} else {
			echo ("<h3 style=\"display: none\">Journal</h3>");
			echo ("<p style=\"display: none\" class=\"journal\"></p>");
		}

		if (array_key_exists('volume', $arraySock)){
			echo ("<h3>Volume</h3>");
			echo ("<p class=\"volume\">$arraySock[volume]</p>");
		} else {
			echo ("<h3 style=\"display: none\">Volume</h3>");
			echo ("<p style=\"display: none\" class=\"volume\"></p>");
		}

		if (array_key_exists('number', $arraySock)){
			echo ("<h3>Number</h3>");
			echo ("<p class=\"number\">$arraySock[number]</p>");
		} else {
			echo ("<h3 style=\"display: none\">Number</h3>");
			echo ("<p style=\"display: none\" class=\"number\"></p>");
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

		if (array_key_exists('publisher', $arraySock)){
			echo ("<h3>Publisher</h3>");
			echo ("<p class=\"publisher\">$arraySock[publisher]</p>");
		} else {
			echo ("<h3 style=\"display: none\">Publisher</h3>");
			echo ("<p style=\"display: none\" class=\"publisher\"></p>");
		}

		if (array_key_exists('note', $arraySock)){
			echo ("<h3>Note</h3>");
			echo ("<p class=\"note\">$arraySock[note]</p>");
		} else  {
			echo ("<h3 style=\"display: none\">Note</h3>");
			echo ("<p style=\"display: none\" class=\"note\"></p>");
		}

		if (array_key_exists('crossref', $arraySock)){
			echo ("<h3>Cross-reference</h3>");
			echo ("<p class=\"crossref\">$arraySock[crossref]</p>");
		} else  {
			echo ("<h3 style=\"display: none\">Cross-reference</h3>");
			echo ("<p style=\"display: none\" class=\"crossref\"></p>");
		}

		if (array_key_exists('isbn', $arraySock)){
			echo ("<h3>ISBN</h3>");
			echo ("<p class=\"isbn\">$arraySock[isbn]</p>");
		} else  {
			echo ("<h3 style=\"display: none\">ISBN</h3>");
			echo ("<p style=\"display: none\" class=\"isbn\"></p>");
		}

		if (array_key_exists('series', $arraySock)){
			echo ("<h3>Series</h3>");
			echo ("<p class=\"series\">$arraySock[series]</p>");
		} else  {
			echo ("<h3 style=\"display: none\">Series</h3>");
			echo ("<p style=\"display: none\" class=\"series\"></p>");
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
	echo("<script type=\"text/javascript\" src=\"js/browsery_proceeding.js\"></script>");
	session_write_close();
	//pg_close($d);
?>
