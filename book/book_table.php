<?php 
	session_start();
    if(isset($_SESSION['login_user'])){
	if(!isset($_SESSION['book_offset']))
	{
		$_SESSION['book_offset'] = 0;
	}
	$next = $_POST['next'];
	$prev = $_POST['prev'];
	if ($next === "1") {
		if(isset($_SESSION['book_offset']))
		{
			$_SESSION['book_offset'] += 50;
		}
	} else if ($prev === "1") {
		if(isset($_SESSION['book_offset']))
		{
			if($_SESSION['book_offset'] >= 50) {
				$_SESSION['book_offset'] -= 50;
			} else {
				$_SESSION['book_offset'] = 0;
			}
			
		}
	} 
	$offset = $_SESSION['book_offset'];

    $st="select editor title mdate year isbn from book 50 $offset\n";
	include('../socket_conn.inc.php');
	foreach ($finalArray as $key => $value) {
		echo '\t<tr role="row">\n';
		$arraySock = json_decode($value, true);
		echo "\t\t<td>$arraySock[editor]</td>\n";
		echo "\t\t<td>$arraySock[title]</td>\n";
		echo "\t\t<td>$arraySock[mdate]</td>\n";
		echo "\t\t<td>$arraySock[year]</td>\n";
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