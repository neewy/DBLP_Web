<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
	<?php 
		include('header.inc.php');
	?>
	<link rel="stylesheet" href="css/codemirror.css">
	<script src="js/codemirror.js"></script>
	<script src="js/dialog.js"></script>
	<script src="js/searchcursor.js"></script>
	<script src="js/search.js"></script>
	<script src="js/sql.js"></script>
	<link rel="stylesheet" href="css/show-hint.css" />
	<link rel="stylesheet" href="css/dialog.css" />
	<script src="js/show-hint.js"></script>
	<script src="js/sql-hint.js"></script>
	</head>
	<body>
	<?php 
			include('topnav.inc.php');
	?>
	<div class="pure-g" id="content_wrapper">
		<div id="content" class="pure-u-1">
				<form class="pure-form queryForm">
					<textarea id="queryCode" name="queryCode"></textarea>
					<button type="submit" class="pure-button pure-button-primary" id="send_query">Submit</button>
				</form>
			<div class="querytable_wrapper pure-u-1-2">
				<table class="pure-table pure-table-bordered">
					<thead id="querytable_head">
					</thead>
					<tbody id="querytable_body">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
		<script>
		$('#send_query').click(function(event){
			event.preventDefault();
            event.stopPropagation();
			$('#querytable_body').html('');
			var query = editor.getValue();
			var s = editor.getValue().toUpperCase(); 
			if (s.indexOf("DELETE") != -1) {
				 vex.dialog.open({ 
					  message: 'You have entered DELETE query. Please enter your username and password:',
					  input: "<input name=\"username\" id=\"username\" type=\"text\" placeholder=\"Username\" required />\n<input name=\"password\" id =\"password\"type=\"password\" placeholder=\"Password\" required />",
					  buttons: [
						$.extend({}, vex.dialog.buttons.YES, {
						  text: 'Login'
						}), $.extend({}, vex.dialog.buttons.NO, {
						  text: 'Back'
						})],
					  onSubmit: function(event) {
								event.preventDefault();
								event.stopPropagation();
								var username = document.querySelector("#username").value
								var password = document.querySelector("#password").value
								  $.ajax({
									   type: "POST",
									   url: 'query_send.php',
									   data: ({"query" : query, "username": username, "password": password}),
									   success: function(data)
									   {
										  var substr = data.substring(0, 5);
										   if (substr == "ERROR") {
												var error = data.replace("ERROR: ", "");
												if (error == '') {
													error = "Warning: Empty input";
												}
												vex.dialog.open({
																	className: 'vex-theme-top', 
																	message: '<div>' + error + '</div>',
																	buttons: [$.extend({}, vex.dialog.buttons.YES, {text: 'OK'})]
												});
										   } else {
											   document.querySelector('.querytable_wrapper').innerHTML = "<h2 style='margin-left: 100px; margin-bottom: 50px'>"+ data + "</h2>";
											   vex.close();
										   }
									   }
								   });	
							}
							});
			} else {
                var querytemp = editor.getValue().split(" "); 
                var index = querytemp.indexOf("FROM") + 1; 
                var tableNameArray = querytemp[index].split("."); 
                var tablename = tableNameArray[1].replace(/\"(.*)\"/, "$1"); 
                if (tablename.indexOf(";") != -1) {tablename = tablename.replace(";","")};
                $.ajax({
				   type: "POST",
				   url: 'query_head.php',
				   data: ({"tablename" : tablename}),
				   success: function(data)
				   {
					   var substr = data.substring(0, 5);
					   if (substr == "ERROR") {
						    var error = data.replace("ERROR: ", "");
							if (error == '') {
								error = "Warning: Empty input";
							}
							vex.dialog.open({
												className: 'vex-theme-top', 
												message: '<div>' + error + '</div>',
												buttons: [$.extend({}, vex.dialog.buttons.YES, {text: 'OK'})]
							});
					   } else {
						   $('#querytable_head').html(data);
					   }
				   }
			   });
				$.ajax({
				   type: "POST",
				   url: 'query_send.php',
				   data: ({"query" : query}),
				   success: function(data)
				   {
					   var substr = data.substring(0, 5);
					   if (substr == "ERROR") {
						    var error = data.replace("ERROR: ", "");
							if (error == '') {
								error = "Warning: Empty input";
							}
							vex.dialog.open({
												className: 'vex-theme-top', 
												message: '<div>' + error + '</div>',
												buttons: [$.extend({}, vex.dialog.buttons.YES, {text: 'OK'})]
							});
					   } else {
						   $('#querytable_body').html(data);
					   }
				   }
			   });
			}
		});
		</script>
		<script>
		window.onload = function() {
		  var mime = 'text/x-sql';
		  window.editor = CodeMirror.fromTextArea(document.getElementById('queryCode'), {
			mode: mime,
			indentWithTabs: true,
			smartIndent: true,
			lineNumbers: true,
			matchBrackets : true,
			autofocus: true,
			onBlur: function() { editor.save() },
			extraKeys: {"Ctrl-Space": "autocomplete"},
			hintOptions: {tables: {
			  article: {key: null, mdate: null, editor: null, title: null, pages: null, year: null, journal: null, volume: null, number: null, month: null, url: null, ee: null, cdrom: null, cite: null, publisher: null, note: null, crossref: null},
			  article_author: {key: null, author: null},
              book: {key: null, mdate: null, editor: null, title: null, pages: null, year: null, volume: null, month: null, url: null, ee: null, cdrom: null, cite: null, publisher: null, note: null, isbn: null, series: null, school: null, chapter: null},
			  book_author: {key: null, author: null},
              incollection: {key: null, mdate: null, title: null, pages: null, year: null, number: null, url: null, ee: null, cdrom: null, cite: null, publisher: null, note: null, crossref: null, chapter: null},
			  incollection_author: {key: null, author: null},
              inproceedings: {key: null, mdate: null, editor: null, title: null, pages: null, year: null, number: null, month: null, url: null, ee: null, cdrom: null, cite: null, note: null, crossref: null},
			  inproceedings_author: {key: null, author: null},
              mastersthesis: {key: null, mdate: null, title: null, pages: null, year: null, url: null, ee: null, school: null},
			  mastersthesis_author: {key: null, author: null},
              phdthesis: {key: null, mdate: null, title: null, pages: null, year: null, volume: null, number: null, url: null, ee: null, publisher: null, note: null, isbn: null, series: null, school: null},
			  phdthesis_author: {key: null, author: null},
              proceedings: {key: null, mdate: null, editor: null, title: null, pages: null, year: null, address: null, jornal: null, volume: null, number: null, url: null, ee: null, publisher: null, note: null, crossref: null, isbn: null, series: null},
			  proceedings_author: {key: null, author: null},
              www: {key: null, mdate: null, editor: null, title: null, year: null, url: null, cite: null, note: null, crossref: null},
              proceedings_author: {key: null, author: null}
			}}
		  });
		};
		</script>
	<script src="js/login-top.js">
	</script>
	<script type="text/javascript">
	$(document).ajaxStart(function() {
		Pace.restart();
	}).ajaxStop( function() { 
		Pace.stop();
	})
	</script>
	</body>
</html>