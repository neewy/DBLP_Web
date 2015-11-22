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
      
	/*$query = "SELECT
	  phdthesis.mdate, 
	  phdthesis.title, 
	  phdthesis.pages, 
	  phdthesis.year, 
	  phdthesis.school
	FROM 
	  dblp.phdthesis
	ORDER BY year DESC
	LIMIT 50
	OFFSET $offset;";*/

    $st="select mdate title pages year school from phdthesis 50 $offset\n";
	include('../socket_conn.inc.php');
	foreach ($finalArray as $key => $value) {
		echo '\t<tr role="row">\n';
		$arraySock = json_decode($value, true);
		echo "\t\t<td>$arraySock[mdate]</td>\n";
		echo "\t\t<td>$arraySock[title]</td>\n";
		echo "\t\t<td>$arraySock[pages]</td>\n";
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


