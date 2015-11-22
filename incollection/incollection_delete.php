<?php session_start();
	$key = $_POST['key'];

	$st = "delete from incollection where key = ;$key;\n";
	include('../socket_conn.inc.php');
	echo($message);

	session_write_close();
?>