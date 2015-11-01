<?php session_start();?>
<!DOCTYPE html>
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
	<div class="pure-g" id="content_wrapper">
		<div id="menu" class="pure-u-1-8">
			<div class="pure-menu">
                <p class="pure-menu-heading">TABLES</p>

				<ul class="pure-menu-list">
					<li class="pure-menu-item"><a href="#article" id="article_link" class="pure-menu-link">Articles</a></li>
					<li class="pure-menu-item"><a href="#book" id="book_link" class="pure-menu-link">Books</a></li>
					<li class="pure-menu-item"><a href="#incollection" id="incollection_link" class="pure-menu-link">Incollections</a></li>
					<li class="pure-menu-item"><a href="#inproceeding" id="inproceeding_link" class="pure-menu-link">Inproceedings</a></li>
					<li class="pure-menu-item"><a href="#mastersthesis" id="masters_link" class="pure-menu-link">Masters Thesises</a></li>
					<li class="pure-menu-item"><a href="#phd" id="phd_link" class="pure-menu-link">PHD Thesises</a></li>
					<li class="pure-menu-item"><a href="#proceeding" id="proceeding_link" class="pure-menu-link">Proceedings</a></li>
				</ul>
			</div>
		</div>
		<div id="prev_div" class="pure-u-1-8 hvr-sweep-to-left"><h1></h1></div>
		<div id="content" class="pure-u-5-8">
			<div class="title">
			</div>
		</div>
		<div id="next_div" class="pure-u-1-8 hvr-sweep-to-right"></div>
	</div>
	<script>
	        $('.pure-menu-item').click(function(event){
				if ($('#next_div').hasClass('pure-u-1-8')){
					
				} else {				
				$('#next_div').addClass('pure-u-1-8');
				}
				if ($('#prev_div').hasClass('pure-u-1-8')){
					
				} else {				
				$('#prev_div').addClass('pure-u-1-8');
				}
				if ($('#content').hasClass('pure-u-7-8')) {
					$('#content').removeClass('pure-u-7-8').addClass('pure-u-5-8');
				}
			});
			$('#article_link').click(function(event){
				$('#content').load('article/article.php');
				$.ajax({
					   type: "POST",
					   url: 'article/article_table.php',
					   success: function(data)
					   {
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data);  
					   }
				});
			});
			$('#book_link').click(function(event){
				$('#content').load('book/book.php');
				$.ajax({
					   type: "POST",
					   url: 'book/book_table.php',
					   success: function(data)
					   {
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data);  
					   }
				   });
			});
			$('#incollection_link').click(function(event){
				$('#content').load('incollection/incollection.php');
				$.ajax({
					   type: "POST",
					   url: 'incollection/incollection_table.php',
					   success: function(data)
					   {
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data);  
					   }
				   });
			});
			$('#inproceeding_link').click(function(event){
				$('#content').load('inproceeding/inproceeding.php');
				$.ajax({
					   type: "POST",
					   url: 'inproceeding/inproceeding_table.php',
					   success: function(data)
					   {
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data);  
					   }
				   });
			});
			$('#masters_link').click(function(event){
				$('#content').load('mastersthesis/mastersthesis.php');
				$.ajax({
					   type: "POST",
					   url: 'mastersthesis/mastersthesis_table.php',
					   success: function(data)
					   {
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data);  
					   }
				   });
			});
			$('#phd_link').click(function(event){
				$('#content').load('phd/phd.php');
				$.ajax({
					   type: "POST",
					   url: 'phd/phd_table.php',
					   success: function(data)
					   {
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data);  
					   }
				   });
			});
			$('#proceeding_link').click(function(event){
				$('#content').load('proceeding/proceeding.php');
				$.ajax({
					   type: "POST",
					   url: 'proceeding/proceeding_table.php',
					   success: function(data)
					   {
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data);  
					   }
				   });
			});
			$("#next_div").click(function(event){
				var hash_link = window.location.hash.substr(1);
				$('.datatable_wrapper').fadeOut().hide();
				event.preventDefault();
				event.stopPropagation();
				$.ajax({
					   type: "POST",
					   url: hash_link + '/' + hash_link + '_table.php',
					   data: ({"next" : 1, "prev" : 0}),
					   success: function(data)
					   {
						    $('.datatable_wrapper').fadeIn();
							$('#datatable_body').html(data).fadeIn();
					   }
				   });
			});
			$("#prev_div").click(function(event){
				var hash_link = window.location.hash.substr(1);
				$('.datatable_wrapper').fadeOut().hide();
				event.preventDefault();
				event.stopPropagation();
				$.ajax({
					   type: "POST",
					   url: hash_link + '/' + hash_link + '_table.php',
					   data: ({"next" : 0, "prev" : 1}),
					   success: function(data)
					   {
						   $('.datatable_wrapper').fadeIn();
						   $('#datatable_body').html(data); 
					   }
				   });
			});
	</script>
	<script src="js/login-top.js">
	</script>
	<script type="text/javascript">
	$(document).ajaxStart(function() {
		Pace.restart();
	}).ajaxStop( function() { 
		Pace.stop();
	})
	jQuery(document).on('click', '[role="row"]', function(e){
		e.preventDefault();
		makeUnselectable(this);
	});
	function makeUnselectable(elem) {
	  if (typeof(elem) == 'string')
		elem = document.getElementById(elem);
	  if (elem) {
		elem.onselectstart = function() { return false; };
		elem.style.MozUserSelect = "none";
		elem.style.KhtmlUserSelect = "none";
		elem.unselectable = "on";
	  }
	}
	
	jQuery(document).on('click', '[role="row"]', function(e){
		e.preventDefault();
		var hash_link = window.location.hash.substr(1);
		$(this).addClass('row-highlight');
		e = e || window.event;
		var dataarray = [];
		var target = e.srcElement || e.target;
		while (target && target.nodeName !== "TR") {
			target = target.parentNode;
		}
		if (target) {
			var cells = target.getElementsByTagName("td");
			for (var i = 0; i < cells.length; i++) {
				dataarray.push(cells[i].innerHTML);
			}
		}
		$('#prev_div').removeClass('pure-u-1-8');
		$('#next_div').removeClass('pure-u-1-8');
		$('#content').fadeOut().hide();
				$.ajax({
					   type: "POST",
					   url:  hash_link + '/' + hash_link + '_page.php',
					   data: ({ "paramName": dataarray }),
					   beforeSend: function(){
						    $('#content').removeClass('pure-u-5-8').addClass('pure-u-7-8');
							$('#content').fadeIn().load('animation.html');
						},
					   success: function(data)
					   {
						   $('#content').html(data);
						   $('#content').css("letter-spacing","0");
						   $('#content').fadeIn();
					   }
				});
		});
		$(document).on('click', ".myButton", function(event) {
			event.preventDefault();
			event.stopPropagation();
			var hash_link = window.location.hash.substr(1);
			$('#content').fadeOut().hide();
			if ($('#next_div').hasClass('pure-u-1-8')){
					
				} else {				
				$('#next_div').addClass('pure-u-1-8');
				}
				if ($('#prev_div').hasClass('pure-u-1-8')){
					
				} else {				
				$('#prev_div').addClass('pure-u-1-8');
				}
				if ($('#content').hasClass('pure-u-7-8')) {
					$('#content').removeClass('pure-u-7-8').addClass('pure-u-5-8');
				}
				$('#content').load(hash_link + '/' + hash_link + '.php');
				$.ajax({
					   type: "POST",
					   url: hash_link + '/' + hash_link + '_table.php',
					   data: ({"next" : 0, "prev" : 0}),
					   success: function(data)
					   {
						   $('#content').fadeIn();
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data); 
					   }
				   });						
		});
		context.init({
			fadeSpeed: 100,
			filter: function ($obj){},
			above: 'auto',
			preventDoubleContext: true,
			compress: false
		});
        $(document).on('click', "#article_search", function(event) {
            var field = document.querySelector('#article-field').value;
            var value = document.querySelector('#article-search-value').value;
            var match = document.querySelector('input#article-match').checked;
            $('#content').fadeOut().hide();
            $.ajax({
					   type: "POST",
					   url: 'article/article_search.php',
					   data: ({"field" : field, "value" : value, "match": match}),
					   success: function(data)
					   {
						   $('#content').fadeIn();
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data); 
					   }
				   });	
        });
        $(document).on('click', "#book_search", function(event) {
            var field = document.querySelector('#book-field').value;
            var value = document.querySelector('#book-search-value').value;
            var match = document.querySelector('input#book-match').checked;
            $('#content').fadeOut().hide();
            $.ajax({
					   type: "POST",
					   url: 'book/book_search.php',
					   data: ({"field" : field, "value" : value, "match": match}),
					   success: function(data)
					   {
						   $('#content').fadeIn();
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data); 
					   }
				   });	
        });
        $(document).on('click', "#incollection_search", function(event) {
            var field = document.querySelector('#incollection-field').value;
            var value = document.querySelector('#incollection-search-value').value;
            var match = document.querySelector('input#incollection-match').checked;
            $('#content').fadeOut().hide();
            $.ajax({
					   type: "POST",
					   url: 'incollection/incollection_search.php',
					   data: ({"field" : field, "value" : value, "match": match}),
					   success: function(data)
					   {
						   $('#content').fadeIn();
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data); 
					   }
				   });	
        });
        $(document).on('click', "#inproceeding_search", function(event) {
            var field = document.querySelector('#inproceeding-field').value;
            var value = document.querySelector('#inproceeding-search-value').value;
            var match = document.querySelector('input#inproceeding-match').checked;
            $('#content').fadeOut().hide();
            $.ajax({
					   type: "POST",
					   url: 'inproceeding/inproceeding_search.php',
					   data: ({"field" : field, "value" : value, "match": match}),
					   success: function(data)
					   {
						   $('#content').fadeIn();
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data); 
					   }
				   });	
        });
        $(document).on('click', "#mastersthesis_search", function(event) {
            var field = document.querySelector('#mastersthesis-field').value;
            var value = document.querySelector('#mastersthesis-search-value').value;
            var match = document.querySelector('input#mastersthesis-match').checked;
            $('#content').fadeOut().hide();
            $.ajax({
					   type: "POST",
					   url: 'mastersthesis/mastersthesis_search.php',
					   data: ({"field" : field, "value" : value, "match": match}),
					   success: function(data)
					   {
						   $('#content').fadeIn();
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data); 
					   }
				   });	
        });
        $(document).on('click', "#phd_search", function(event) {
            var field = document.querySelector('#phd-field').value;
            var value = document.querySelector('#phd-search-value').value;
            var match = document.querySelector('input#phd-match').checked;
            $('#content').fadeOut().hide();
            $.ajax({
					   type: "POST",
					   url: 'phd/phd_search.php',
					   data: ({"field" : field, "value" : value, "match": match}),
					   success: function(data)
					   {
						   $('#content').fadeIn();
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data); 
					   }
				   });	
        });
        $(document).on('click', "#proceeding_search", function(event) {
            var field = document.querySelector('#proceeding-field').value;
            var value = document.querySelector('#proceeding-search-value').value;
            var match = document.querySelector('input#proceeding-match').checked;
            $('#content').fadeOut().hide();
            $.ajax({
					   type: "POST",
					   url: 'proceeding/proceeding_search.php',
					   data: ({"field" : field, "value" : value, "match": match}),
					   success: function(data)
					   {
						   $('#content').fadeIn();
						   $(".datatable_wrapper").fadeIn();
						   $('#datatable_body').html(data); 
					   }
				   });	
        });
	</script>
	</body>
</html>