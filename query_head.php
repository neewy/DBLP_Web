<?php session_start();
if(isset($_SESSION[login_user]) AND isset($_SESSION['role']) AND $_SESSION['role'] === "admin"){
error_reporting(E_ERROR);
$tablename = $_POST['tablename'];

include('dbconnection.inc.php');        
$query = "SELECT column_name
FROM information_schema.columns
WHERE table_schema = 'dblp'
  AND table_name   = '$tablename';";
    $result = pg_query($d, $query);
	if (!$result) {
		echo("ERROR: ");
		echo(pg_last_error());
	} else {
        echo "\t<tr>\n";
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
				foreach ($line as $col_value) {
			         echo "\t\t<th>$col_value</th>\n";
		          }
		}
        echo "\t</tr>\n";
	}	
pg_close();
} else {
		echo("<h2>Please, log into the system as the administrator</h2>");
	} ?>