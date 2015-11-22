<?php session_start();
    if(isset($_SESSION['login_user'])){
	if(!isset($_SESSION['incollection_offset']))
	{
		$_SESSION['incollection_offset'] = 0;
	}
	$next = $_POST['next'];
	$prev = $_POST['prev'];
	if ($next === "1") {
		if(isset($_SESSION['incollection_offset']))
		{
			$_SESSION['incollection_offset'] += 50;
		}
	} else if ($prev === "1") {
		if(isset($_SESSION['incollection_offset']))
		{
			if($_SESSION['incollection_offset'] >= 50) {
				$_SESSION['incollection_offset'] -= 50;
			} else {
				$_SESSION['incollection_offset'] = 0;
			}
			
		}
	} 
	$offset = $_SESSION['incollection_offset'];
    $st="select key title year from incollection 50 $offset\n";
    //$st="groupby incollection title 10 $offset\n";
	include('../socket_conn.inc.php');
	/*$query = "SELECT  
	  incollection.mdate, 
	  incollection.title, 
	  incollection.year
	FROM 
	  dblp.incollection  
	GROUP BY incollection.title, incollection.mdate, incollection.year
	LIMIT 50 
	OFFSET $offset;";*/

	
    foreach ($finalArray as $key => $value) {
		echo '\t<tr role="row">\n';
		$arraySock = json_decode($value, true);
		echo "\t\t<td>$arraySock[key]</td>\n";
		echo "\t\t<td>$arraySock[title]</td>\n";
		echo "\t\t<td>$arraySock[year]</td>\n";
		echo "\t</tr>\n";
	}

        echo ("<script>");
        echo ("$(\"#sortTable\").tablesorter();");
        echo ("</script>");
	session_write_close();
    }
?>