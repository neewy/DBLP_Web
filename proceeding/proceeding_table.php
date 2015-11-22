<?php 
	session_start();
    if(isset($_SESSION['login_user'])){
	if(!isset($_SESSION['proceeding_offset']))
	{
		$_SESSION['proceeding_offset'] = 0;
	}
	$next = $_POST['next'];
	$prev = $_POST['prev'];
	if ($next === "1") {
		if(isset($_SESSION['proceeding_offset']))
		{
			$_SESSION['proceeding_offset'] += 50;
		}
	} else if ($prev === "1") {
		if(isset($_SESSION['proceeding_offset']))
		{
			if($_SESSION['proceeding_offset'] >= 50) {
				$_SESSION['proceeding_offset'] -= 50;
			} else {
				$_SESSION['proceeding_offset'] = 0;
			}
			
		}
	} 
	$offset = $_SESSION['proceeding_offset'];
      
	/*$query = "SELECT 
	  proceedings.editor, 
	  proceedings.title, 
	  proceedings.mdate, 
	  proceedings.year, 
	  proceedings.publisher, 
	  proceedings.isbn, 
	  proceedings.series
	FROM 
	  dblp.proceedings
	ORDER BY proceedings.year DESC
	LIMIT 50
	OFFSET $offset;";*/

    $st="select key editor title mdate year publisher isbn series from proceeding 50 $offset\n";
	include('../socket_conn.inc.php');

	foreach ($finalArray as $keys => $value) {
		echo '\t<tr role="row">\n';
		$arraySock = json_decode($value, true);
		echo "\t\t<td>$arraySock[key]</td>\n";
		echo "\t\t<td>$arraySock[editor]</td>\n";
		echo "\t\t<td>$arraySock[title]</td>\n";
		echo "\t\t<td>$arraySock[mdate]</td>\n";
		echo "\t\t<td>$arraySock[year]</td>\n";
		echo "\t\t<td>$arraySock[publisher]</td>\n";
		echo "\t\t<td>$arraySock[isbn]</td>\n";
		echo "\t</tr>\n";
	}
        echo ("<script>");
        echo ("$(\"#sortTable\").tablesorter();");
        echo ("</script>");
	session_write_close();
	//pg_close($d);
    }
?>



