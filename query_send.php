<?php session_start();
if(isset($_SESSION['login_user']) AND isset($_SESSION['role']) AND $_SESSION['role'] === "admin"){
error_reporting(E_ERROR);
$query = $_POST['query'];
$delete = "DELETE";
include('dbconnection.inc.php');        
if (stripos($query, $delete) != false) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	include('dbconnection2.inc.php'); 
	$query_auth = "SELECT * FROM public.accounts WHERE accounts.user LIKE '$username' AND accounts.password LIKE md5('$password');";
	$result_auth = pg_query($d2, $query_auth);	
	$rows = pg_num_rows($result_auth);
	if($rows != 1) {
		echo("ERROR: Username or Password is invalid");
	} else {
		$result = pg_query($d, $query);
		if (!$result) {
			echo("ERROR: ");
			echo(pg_last_error());
		} else {
			echo ("Deleted!");
		}
	}
} else {
    //echo(print_r($_POST));
    //echo ($query);
	$result = pg_query($d, $query);
	if (!$result) {
		echo("ERROR: ");
		echo(pg_last_error());
	} else {
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		echo "\t<tr>\n";
		foreach ($line as $col_value) {
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
		}
	}
}	
pg_close();
} else {
		echo("<h2>Please, log into the system as the administrator</h2>");
	} ?>