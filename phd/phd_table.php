<?php 
	session_start();
if(isset($_SESSION['login_user'])){
	if(!isset($_SESSION['phd_offset']))
	{
		$_SESSION['phd_offset'] = 0;
	}
	$next = $_POST['next'];
	$prev = $_POST['prev'];
	if ($next === "1") {
		if(isset($_SESSION['phd_offset']))
		{
			$_SESSION['phd_offset'] += 50;
		}
	} else if ($prev === "1") {
		if(isset($_SESSION['phd_offset']))
		{
			if($_SESSION['phd_offset'] >= 50) {
				$_SESSION['phd_offset'] -= 50;
			} else {
				$_SESSION['phd_offset'] = 0;
			}
			
		}
	} 
	$offset = $_SESSION['phd_offset'];
    include('../dbconnection.inc.php');        
	$query = "SELECT
	  phdthesis.mdate, 
	  phdthesis.title, 
	  phdthesis.pages, 
	  phdthesis.year, 
	  phdthesis.school
	FROM 
	  dblp.phdthesis
	ORDER BY year DESC
	LIMIT 50
	OFFSET $offset;";
	$result = pg_query($d, $query);
	
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		echo '\t<tr role="row">\n';
		foreach ($line as $col_value) {
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
		}
        $query2 = "SELECT COUNT(*) FROM dblp.phdthesis;";
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


