<?php

	session_start();
	
	include("connection.php");
	
	$sessionId = isset($_SESSION['id']) ? $_SESSION['id'] : '';
	
	$query = "SELECT * FROM users WHERE id='".$sessionId."' LIMIT 1";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_array($result);
	$diary = $row["diary"];
	$user = $row["email"];
	
?>

<!doctype html>
<html>
	<head>
		<title>Secret Diary</title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	
		<div class="navbar-inverse navbar-default navbar-fixed-top no-margin transparent">
		
			<div class="container">
			
				<div class="navbar-header">			
					<a href="" class="navbar-brand impact"><span class="glyphicon glyphicon-book"></span> SECRET DIARY</a>		
					<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>						
				</div>
				
				<div class="collapse navbar-collapse pull-left">
					<ul class="nav navbar-nav">
						<li><a href=""><?php echo $user; ?></a></li>
					</ul>
				</div>
				
				<div class="collapse navbar-collapse pull-right">
					<ul class="nav navbar-nav">
						<li><a href="index.php?logout=1">Log Out</a></li>
						<!-- <li><a href="#div2">Div 2</a></li>
						<li><a href="#div3">Div 3</a></li>
						<li><a href="#div4">Div 4</a></li>
						<li><a href="#div5">Div 5</a></li>
						<li><a href="#div6">Div 6</a></li> -->
					</ul>
				</div>
				
			</div>
			
		</div>
		
		<div class="container contentContainer bg">
		
			<div class="row">
				
				<div class="col-md-8 col-md-offset-2 content padding center">
					
					<textarea id="diary" class="form-control"><?php echo $diary; ?></textarea>

				</div>
				
			</div>
			
		</div>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="script.js"></script>
		<script>
			$(".contentContainer").css("min-height", $(window).height());
			$("textarea").css("height", $(window).height()-100);
			
			$("textarea").keyup(function() { // Keyup means on change. Key update.
				$.post("update-diary.php", {diary: $("textarea").val()} ); // This stores the content of the textarea into the diary variable and the posts it to update-diary.php // This is AJAX
			});
			
		</script>
	</body>
</html>






