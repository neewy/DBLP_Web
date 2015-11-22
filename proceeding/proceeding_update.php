<?php session_start();
	include('../socket_send.inc.php');

	$key_q = $_POST['key'];

	foreach($_POST as $key => $value) {
		if (preg_match("/author./", $key)){
			unset($_POST[$key]);
		} else if (preg_match("/key/", $key)){
			unset($_POST[$key]);
		} else {
			$st = "update proceeding set $key = ;$value; where key = ;$key_q;\n";
			$sent = socket_write($sock, $st, 2048);
		}
	}
	$message = socket_recv($sock, $part_message, 10000000, 0);
	$message = $part_message;

	$message = utf8_encode($message);
	$message = trim($message);
	echo ($message);
	session_write_close();
	socket_close($sock);
?>