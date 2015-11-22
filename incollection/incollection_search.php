<?php 
	session_start();
	if(isset($_SESSION['login_user'])){
		
		$field = strtolower($_POST['field']);
		$value = $_POST['value'];

        if ($field === "key") {
            $st = "select * from incollection where $field = ;$value; 1 0\n";
        } else {
            $st = "select * from incollection where $field = ;$value; 10 0\n";
        }
        include('../socket_conn.inc.php');
        foreach ($finalArray as $key => $value) {
            echo '\t<tr role="row">\n';
            $arraySock = json_decode($value, true);
            echo "\t\t<td>$arraySock[key]</td>\n";
            echo "\t\t<td>$arraySock[title]</td>\n";
            echo "\t\t<td>$arraySock[year]</td>\n";
            echo "\t</tr>\n";
        }

        echo ("<script>");
        echo ("$('#top-legend').html(\"Showing $rows results \")");
        echo ("</script>");


        session_write_close();
	}
?>