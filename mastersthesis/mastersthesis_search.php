<?php 
	session_start();
	if(isset($_SESSION['login_user'])){
		
		$field = strtolower($_POST['field']);
		$value = pg_escape_string($_POST['value']);
        $match = $_POST['match'];
        
        $query;
        
        include('../dbconnection.inc.php');        
        if ($match === "true"){
            if ($field === "mdate") {
                $query = "SELECT
              mastersthesis.mdate, 
              mastersthesis.title,
              mastersthesis.year, 
              mastersthesis.school
            FROM 
              dblp.mastersthesis
            WHERE mdate='{$value}';";
            } else {
                $query = "SELECT
              mastersthesis.mdate, 
              mastersthesis.title,
              mastersthesis.year, 
              mastersthesis.school
            FROM 
              dblp.mastersthesis
            WHERE $field LIKE '{$value}';";
            }
        } else {
            if ($field === "mdate") {
                $query = "SELECT
              mastersthesis.mdate, 
              mastersthesis.title,
              mastersthesis.year, 
              mastersthesis.school
            FROM 
              dblp.mastersthesis
            WHERE mdate='{$value}';";
            } else {
                $query = "SELECT
              mastersthesis.mdate, 
              mastersthesis.title,
              mastersthesis.year, 
              mastersthesis.school
            FROM 
              dblp.mastersthesis
            WHERE $field LIKE '%{$value}%';";
            }
        }
		$result = pg_query($d, $query);
		
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
			echo '\t<tr role="row">\n';
			foreach ($line as $col_value) {
				echo "\t\t<td>$col_value</td>\n";
			}
			echo "\t</tr>\n";
			}
        
        
        $rows = pg_num_rows($result);
        if ($rows === 1) {
            echo ("<script>");
            echo ("$('#top-legend').html(\"Showing single result \")");
            echo ("</script>");
        } else {
            echo ("<script>");
            echo ("$('#top-legend').html(\"Showing $rows results \")");
            echo ("</script>");
        }
        
		session_write_close();
		pg_close($d);
	}
?>