<?php 
	session_start();
	if(isset($_SESSION['login_user'])){
		
		$field = strtolower($_POST['field']);
		$value = $_POST['value'];
        $match = $_POST['match'];
        
        $query;
        
        include('../dbconnection.inc.php');        
        if ($match === "true"){
            if ($field === "mdate") {
                $query = "SELECT 
              proceedings.editor, 
              proceedings.title, 
              proceedings.mdate, 
              proceedings.year, 
              proceedings.publisher, 
              proceedings.isbn, 
              proceedings.series
            FROM 
              dblp.proceedings
            WHERE mdate='$value';";
            } else if ($field === "author") {
                $query = "SELECT proceedings.editor, 
              proceedings.title, 
              proceedings.mdate, 
              proceedings.year, 
              proceedings.publisher, 
              proceedings.isbn, 
              proceedings.series
            FROM 
              dblp.proceedings
            JOIN dblp.proceedings_author ON proceedings.key = proceedings_author.key
            WHERE $field LIKE '$value';";
            } else {
                $query = "SELECT proceedings.editor, 
              proceedings.title, 
              proceedings.mdate, 
              proceedings.year, 
              proceedings.publisher, 
              proceedings.isbn, 
              proceedings.series
            FROM 
              dblp.proceedings
            WHERE $field LIKE '$value';";
            }
        } else {
            if ($field === "mdate") {
                $query = "SELECT proceedings.editor, 
              proceedings.title, 
              proceedings.mdate, 
              proceedings.year, 
              proceedings.publisher, 
              proceedings.isbn, 
              proceedings.series
            FROM 
              dblp.proceedings
            WHERE mdate='$value';";
            } else if ($field === "author") {
                $query = "SELECT proceedings.editor, 
              proceedings.title, 
              proceedings.mdate, 
              proceedings.year, 
              proceedings.publisher, 
              proceedings.isbn, 
              proceedings.series
            FROM 
              dblp.proceedings
            JOIN dblp.proceedings_author ON proceedings.key = proceedings_author.key
            WHERE $field LIKE '%$value%';";
            } else {
                $query = "SELECT proceedings.editor, 
              proceedings.title, 
              proceedings.mdate, 
              proceedings.year, 
              proceedings.publisher, 
              proceedings.isbn, 
              proceedings.series
            FROM 
              dblp.proceedings
            WHERE $field LIKE '%$value%';";
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