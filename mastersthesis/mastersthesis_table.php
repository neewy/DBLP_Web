<?php session_start();
    if(isset($_SESSION['login_user'])){
    
	/*$query = "SELECT
	  mastersthesis.mdate, 
	  mastersthesis.title,
	  mastersthesis.year, 
	  mastersthesis.school
	FROM 
	  dblp.mastersthesis;";*/
	
	$st="select mdate title year school from mastersthesis 100 0 \n";
	include('../socket_conn.inc.php');
	//echo ("<pre>");
	foreach ($finalArray as $key => $value) {
		echo '\t<tr role="row">\n';
		$arraySock = json_decode($value, true);
		echo "\t\t<td>$arraySock[mdate]</td>\n";
		echo "\t\t<td>$arraySock[title]</td>\n";
		echo "\t\t<td>$arraySock[year]</td>\n";
		echo "\t\t<td>$arraySock[school]</td>\n";
		echo "\t</tr>\n";
	}
       

        echo ("<script>");
        echo ("$(\"#sortTable\").tablesorter();");
        echo ("</script>");
	session_write_close();
	//pg_close($d);
    }
?>

