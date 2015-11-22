<?php
	set_time_limit(0);
	ob_implicit_flush();

	$st = "commit\n";
	
	$PORT = 6666; //the port on which we are connecting to the "remote" machine
	$HOST = "127.0.0.1"; //the ip of the remote machine (in this case it's the same machine)

	$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) //Creating a TCP socket
	or die("error: could not create socket\n");

	$succ = socket_connect($sock, $HOST, $PORT) //Connecting to to server using that socket
	or die("error: could not connect to host\n");
	$sent = socket_write($sock, $st, 1024);

	$message = socket_recv($sock, $part_message, 10000000, 0);
	$message = $part_message;

	$message = utf8_encode($message);
	$message = trim($message);
	$finalArray = explode("\n", $message);
	socket_close($sock);
?>