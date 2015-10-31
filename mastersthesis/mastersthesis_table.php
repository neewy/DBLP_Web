<?php session_start();
    if(isset($_SESSION['login_user'])){
include('../dbconnection.inc.php');        
	$query = "SELECT
	  mastersthesis.mdate, 
	  mastersthesis.title,
	  mastersthesis.year, 
	  mastersthesis.school
	FROM 
	  dblp.mastersthesis;";
	$result = pg_query($d, $query);
	
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		echo '\t<tr role="row">\n';
		foreach ($line as $col_value) {
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
		}
        $query2 = "SELECT COUNT(*) FROM dblp.mastersthesis;";
        $result2 = pg_query($d, $query2);
        $row2 = pg_fetch_row($result2);
        echo ("<script>");
        echo ("$('#top-legend').html(\"Showing 50 results with offset $offset of $row2[0] records\")");
        echo ("</script>");
        echo ("<script>");
        echo ("$(\"#sortTable\").tablesorter();");
        echo ("</script>");
	session_write_close();
	pg_close($d);
    }
?>

