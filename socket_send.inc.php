<?php
set_time_limit(0);
ob_implicit_flush();

$PORT = 6666; //the port on which we are connecting to the "remote" machine
$HOST = "127.0.0.1"; //the ip of the remote machine (in this case it's the same machine)

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) //Creating a TCP socket
or die("error: could not create socket\n");

$succ = socket_connect($sock, $HOST, $PORT) //Connecting to to server using that socket
or die("error: could not connect to host\n");
?>