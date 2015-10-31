<?php session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	include('dbconnection2.inc.php'); 
	$query = "SELECT * FROM public.accounts WHERE accounts.user LIKE '$username' AND accounts.password LIKE md5('$password');";
	$result = pg_query($d2, $query);	
	$rows = pg_num_rows($result);
	if($rows != 1) {
		$error = "Username or Password is invalid";
	} else {
		$row = pg_fetch_row($result);
		$_SESSION['login_user']=$row[0]; //Storing user session value.
		$_SESSION['role']=$row[3]; //Storing user session value.
		echo ('true');
	}
	pg_close($d2); 
?>