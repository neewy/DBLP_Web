<?php session_start();

		include('../dbconnection.inc.php');	
		
		$key_q = $_POST['key'];
		$aff_rows = 0;
		
        foreach($_POST as $key => $value) {
			if (preg_match("/author/", $key)) {
						$query_del = "DELETE FROM dblp.incollection_author WHERE key LIKE '$key_q'";
                        $result_del = pg_query($d, $query_del);
			}
        }

		foreach($_POST as $key => $value) {
			if (preg_match("/author/", $key)) {
						$query_auth = "INSERT INTO dblp.incollection_author VALUES ('$key_q','$value');";
						$result_auth = pg_query($d, $query_auth);
						$inprocres_auth = pg_affected_rows($result_auth);
						$aff_rows = $aff_rows + $inprocres_auth;
			} else {
					if($key != "key") {
						$query = "UPDATE dblp.incollection SET $key = '$value' WHERE key LIKE '$key_q';";
						$result = pg_query($d, $query);
						$inprocres = pg_affected_rows($result);
						$aff_rows = $aff_rows + $inprocres;
					}
			}  			
		}
	echo ("$aff_rows rows have been affected");
	session_write_close();
	pg_close($d);
?>