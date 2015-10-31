<?php session_start(); ?><!DOCTYPE html>
<html>
	<head>
		<?php 
			include('header.inc.php');
		?>
	</head>
	<body>
		<?php 
				include('topnav.inc.php');
		?>
	
	<div id="content" class="pure-g">
		<div class="pure-u-1 title">
			<h1>Publication Management System</h1>
			<h2>PMS based on DBLP database, made for DMD project.</h2>
		</div>
		<div class="pure-u-1 buttons is-center pure-g-valign-fix">
			<p>
			<a href="https://github.com/BulatMukhutdinov/DMD_Java4Life">★ On GitHub</a>  <?php if (!(isset($_SESSION['login_user']))){ 
			echo('<a href="#" class="login">Login</a>');
             } else { echo('<a href="#" class="logout">Logout</a>'); } ?>
			</p>
		</div>
	</div>
	<script src="js/login-main.js">
	</script>
	</body>
</html>