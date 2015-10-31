<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			include('header.inc.php');
		?>
    <link href="../css/jquery-editable.css" rel="stylesheet"/>      
    </script>
	</head>
	<body>
	<?php 
			include('topnav.inc.php');
	?>
	<div class="pure-g" id="content_wrapper">
		<div id="menu" class="pure-u-1-8">
			<div class="pure-menu">
                <p class="pure-menu-heading">SETTINGS</p>
				<ul class="pure-menu-list">
					<li class="pure-menu-item"><a href="#users" id="users_link" class="pure-menu-link">Users</a></li>
				</ul>
			</div>
		</div>
		<div id="content" class="pure-u-7-8">
            <div id="title">
                <h2>Users</h2>
            </div>
            <div id="inner_content">
            </div>
		</div>
	</div>
	<script src="js/login-top.js">
	</script>
	<script type="text/javascript">
	$(document).ajaxStart(function() {
		Pace.restart();
	}).ajaxStop( function() { 
		Pace.stop();
	});
    $('#users_link').click(function(event){
				$.ajax({
					   type: "POST",
					   url: 'users_settings.php',
					   success: function(data)
					   {
						   //$(".datatable_wrapper").fadeIn();
						   $('#inner_content').html(data);  
					   }
				   });
			});
    </script>
	</body>
</html>