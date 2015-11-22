<?php 
	session_start();
	if(isset($_SESSION['login_user'])){
		if(!isset($_SESSION['article_offset']))
		{
			$_SESSION['article_offset'] = 0;
		}
		$next = $_POST['next'];
		$prev = $_POST['prev'];
		if ($next === "1") {
			if(isset($_SESSION['article_offset']))
			{
				$_SESSION['article_offset'] += 50;
			}
		} else if ($prev === "1") {
			if(isset($_SESSION['article_offset']))
			{
				if($_SESSION['article_offset'] >= 50) {
					$_SESSION['article_offset'] -= 50;
				} else {
					$_SESSION['article_offset'] = 0;
				}
				
			}
		}
        
        $offset = $_SESSION['article_offset'];
        		
		//include('../dbconnection.inc.php');
		
		// $query = "SELECT 
		  // article.key, 
		  // article.mdate, 
		  // article.title, 
		  // article.year, 
		  // article.journal, 
		  // article.volume, 
		  // article.number
		// FROM 
		  // dblp.article
		// LIMIT 50
		// OFFSET ;";
		//$result = pg_query($d, $query);
		$st="select key mdate title year journal volume number from article 50 $offset\n";
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

        echo ("<script>");
        echo ("$(\"#sortTable\").tablesorter();");
        echo ("</script>");
		session_write_close();
		//pg_close($d);
	}
?>