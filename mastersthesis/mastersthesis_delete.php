<?php session_start();
	$key = $_POST['key'];

include('../dbconnection.inc.php');        
	
	
	$query = "DELETE FROM dblp.mastersthesis WHERE key LIKE '$key';";
	$query2 = "DELETE FROM dblp.mastersthesis_author WHERE key LIKE '$key'";
	
	$result = pg_query($d, $query);
	$inprocres = pg_affected_rows($result);
	$result2 = pg_query($d, $query2);
	$authorsres = pg_affected_rows($result2);
	
	$rowsaffected = $inprocres + $authorsres ;
	
	echo("<p>$rowsaffected rows were deleted</p>");
	
	session_write_close();
	pg_close($d);
?>