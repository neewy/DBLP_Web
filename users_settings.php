<?php session_start();
    include('dbconnection2.inc.php'); 
		
	$query = "SELECT 
  accounts.user, 
  accounts.email, 
  accounts.role, 
  accounts.date_added
FROM 
  public.accounts;";
 
  $result = pg_query($d2, $query);

  echo("<table class=\"pure-table\" style=\"margin-top: 50px\">");

  echo("<thead><tr>");
  echo("<th>User</th>");
  echo("<th>Email</th>");
  echo("<th>Role</th>");
  echo("<th>Date Added</th>");
  echo("</tr></thead>");
  echo("<tbody>");

  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
			echo '<tr>';
            $i = 0;
            $user;
			foreach ($line as $col_value) {
                if ($i == 0){
                $user = $col_value;
                echo "<td class=\"editable-user user\" id=\"$user\">$col_value</td>";
                } else if ($i == 1){
				echo "<td class=\"editable-user email\" id=\"$user\">$col_value</td>";
                } else if ($i == 2){
                    echo "<td class=\"editable-group user-role\"><select id=\"$user\">";
                    if ($col_value === "user"){
                        echo('<option value="user" selected class="default">User</option><option value="moderator">Moderator</option><option value="admin">Admin</option>');
                    } else if ($col_value === "moderator"){
                        echo('<option value="user">User</option><option value="moderator" selected class="default">Moderator</option><option value="admin">Admin</option>');
                    } else if ($col_value === "admin") {
                        echo('<option value="user">User</option><option value="moderator">Moderator</option><option value="admin" selected class="default">Admin</option>');
                    }
                    echo("</select></td>");
                } else if ($i == 3){
                    echo "<td class=\"editable-user date\" id=\"$user\">$col_value</td>";
                }
                $i++;
			}
			echo "</tr>";
   }

  echo("</tbody>");
  echo("</table>");
  echo("<a id=\"update_users\" class=\"pure-button pure-button-primary\" style=\"margin-top: 20px\">Update users</a>");
  echo("<div id=\"message\"></div>");
echo('<script src="js/jquery.poshytip.js"></script>');        
echo('<script src="js/jquery-editable-poshytip.js"></script>'); 
  echo("<script>");
  echo("$('.editable-user').editable({type: 'text'});");
  echo("$.fn.editable.defaults.mode = 'inline';");
  echo("</script>");
  echo('<script src="js/user_send.js"></script>'); 
    session_write_close();
	pg_close($d2);


?>