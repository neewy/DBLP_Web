<?php session_start();
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_conf = $_POST['password_conf'];
	include('dbconnection2.inc.php'); 
	if($password === $password_conf) {
		$query = "SELECT * FROM public.accounts WHERE accounts.user LIKE '$username';";
		$result = pg_query($d2, $query);	
		$rows = pg_num_rows($result);
		if($rows != 0) {
			$error = "You cannot use this login to register";
			echo("$error");
		} else {
            $date = date("Y-m-d");
			$query2 ="INSERT INTO public.accounts (\"user\", \"password\", \"email\", \"role\", \"date_added\") VALUES ('$username', md5('$password'),'$email','user', '$date');";
			$result2 = pg_query($d2, $query2);
            $_SESSION['login_user']=$username; 
            $_SESSION['role']="user";
			echo('Success!');
		}
		pg_close($d2); 
	} else {
		echo('Password and its confirmation should match!');
	}
?>