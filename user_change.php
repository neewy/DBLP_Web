<?php session_start();

    include('dbconnection2.inc.php'); 

	$numrow = 0;
		
    $nameUpdate = array();
    foreach($_POST as $name => $value) {
		foreach($value as $key => $value2) {
            if ($key === "user") {
                $nameUpdate[] = "UPDATE public.accounts SET \"$key\" = '$value2' WHERE \"user\" LIKE '$name';";
            } else if ($key === "date_added") {
                $query = "UPDATE public.accounts SET $key = '$value2' WHERE \"user\" LIKE '$name';";
                $result = pg_query($d2, $query);
                $numrow = $numrow + pg_affected_rows($result);
            } else {
              $query = "UPDATE public.accounts SET $key = '$value2' WHERE \"user\" LIKE '$name';";
              $result = pg_query($d2, $query);
              $numrow = $numrow + pg_affected_rows($result);
            }
		}
	}
    foreach($nameUpdate as $key => $value) {
        $query = $value;
        $result = pg_query($d2, $query);
        $numrow = $numrow + pg_affected_rows($result);
    }
    echo ("$numrow rows were affected");
    session_write_close();
	pg_close($d2);
?>