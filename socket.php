<?php 
	echo("<meta charset=\"utf-8\">");
	set_time_limit(0); 
	ob_implicit_flush(); 
		 
    $PORT = 6666; //the port on which we are connecting to the "remote" machine
    $HOST = "127.0.0.1"; //the ip of the remote machine (in this case it's the same machine)

	//socket_set_nonblock($sock);
		
    $sock = socket_create(AF_INET, SOCK_STREAM, 0) //Creating a TCP socket
    or die("error: could not create socket\n");
		
    $succ = socket_connect($sock, $HOST, $PORT) //Connecting to to server using that socket
    or die("error: could not connect to host\n");
    $st="select * from incollection where key = ;kek; 1 0\n";
    $sent = socket_write($sock, $st, 1024);
	
	$message = socket_recv($sock, $part_message, 10000000, 0);
	$message = $part_message; 
	
	$message = utf8_encode($message); 
	$message = trim($message);
	$finalArray = explode("\n", $message);
	
	echo ("<pre>");
	foreach ($finalArray as $key => $value) {
		$array = json_decode($value, true);
		echo(print_r($array));
	}
	echo ("</pre>");
?>