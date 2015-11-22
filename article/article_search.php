<?php 
	session_start();
	if(isset($_SESSION['login_user'])){
		
		$field = strtolower($_POST['field']);
		$value = $_POST['value'];
        if ($field === "key") {
            $st = "select * from article where $field = ;$value; 1 0\n";
        } else {
            $st = "select * from article where $field = ;$value; 10 0\n";
        }
        include('../socket_conn.inc.php');
        foreach ($finalArray as $key => $value) {
            echo '\t<tr role="row">\n';
            $arraySock = json_decode($value, true);
            echo "\t\t<td>$arraySock[key]</td>\n";
            echo "\t\t<td>$arraySock[mdate]</td>\n";
            echo "\t\t<td>$arraySock[title]</td>\n";
            echo "\t\t<td>$arraySock[year]</td>\n";
            echo "\t\t<td>$arraySock[journal]</td>\n";
            echo "\t\t<td>$arraySock[volume]</td>\n";
            echo "\t\t<td>$arraySock[number]</td>\n";
            echo "\t</tr>\n";
        }
        /*if ($match === "true"){
            if ($field === "mdate") {
                $query = "SELECT 
              article.key, 
              article.mdate, 
              article.title, 
              article.year, 
              article.journal, 
              article.volume, 
              article.number
            FROM 
              dblp.article
            WHERE mdate='$value';";
            } else if ($field === "author") {
                $query = "SELECT 
              article.key, 
              article.mdate, 
              article.title, 
              article.year, 
              article.journal, 
              article.volume, 
              article.number
            FROM 
              dblp.article
            JOIN dblp.article_author ON article_author.key = article.key
            WHERE $field LIKE '$value';";
            } else {
                $query = "SELECT 
              article.key, 
              article.mdate, 
              article.title, 
              article.year, 
              article.journal, 
              article.volume, 
              article.number
            FROM 
              dblp.article
            WHERE $field LIKE '$value';";
            }
        } else {
            if ($field === "mdate") {
                $query = "SELECT 
              article.key, 
              article.mdate, 
              article.title, 
              article.year, 
              article.journal, 
              article.volume, 
              article.number
            FROM 
              dblp.article
            WHERE mdate='$value';";
            } else if ($field === "author") {
                $query = "SELECT 
              article.key, 
              article.mdate, 
              article.title, 
              article.year, 
              article.journal, 
              article.volume, 
              article.number
            FROM 
              dblp.article
            JOIN dblp.article_author ON article_author.key = article.key
            WHERE $field LIKE '%$value%';";
            } else {
                $query = "SELECT 
              article.key, 
              article.mdate, 
              article.title, 
              article.year, 
              article.journal, 
              article.volume, 
              article.number
            FROM 
              dblp.article
            WHERE $field LIKE '%$value%';";
            }
        }*/

            echo ("<script>");
            echo ("$('#top-legend').html(\"Showing 10 results \")");

		session_write_close();
	}
?>