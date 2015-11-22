<?php session_start();
if(isset($_SESSION['login_user'])){
	if(!isset($_SESSION['inproceeding_offset']))
	{
		$_SESSION['inproceeding_offset'] = 0;
	}
	if( !isset( $_SESSION['inproceeding_counter'] ) )
	   {
		  $_SESSION['inproceeding_counter'] = 0;
	   }
	$next = $_POST['next'];
	$prev = $_POST['prev'];
	if ($next === "1") {
		if(isset($_SESSION['inproceeding_offset']))
		{
			$_SESSION['inproceeding_offset'] += 50;
		}
	} else if ($prev === "1") {
		if(isset($_SESSION['inproceeding_offset']))
		{
			if($_SESSION['inproceeding_offset'] >= 50) {
				$_SESSION['inproceeding_offset'] -= 50;
			} else {
				$_SESSION['inproceeding_offset'] = 0;
			}
			
		}
	} 
	$offset = $_SESSION['inproceeding_offset'];
       
	/*$query = "SELECT DISTINCT
	inproceedings.title, inproceedings.year
	FROM 
	  dblp.inproceedings 
	ORDER BY inproceedings.year DESC
	LIMIT 50
	OFFSET $offset;";*/
		
    $st="select key title year from inproceeding 50 $offset\n";
    //БУЛАТ МОЛОДЕЦ!
	include('../socket_conn.inc.php');
	//echo ("<pre>");
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
	//pg_close($d);
}
?>