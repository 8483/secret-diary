<?php include("login.php"); ?>

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
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>		
				</div>
				
				<div class="collapse navbar-collapse">
					<!-- <ul class="nav navbar-nav">
						<li><a href="#div1">Div 1</a></li>
						<li><a href="#div2">Div 2</a></li>
						<li><a href="#div3">Div 3</a></li>
						<li><a href="#div4">Div 4</a></li>
						<li><a href="#div5">Div 5</a></li>
						<li><a href="#div6">Div 6</a></li>
					</ul> -->
					
					<form class="navbar-form navbar-right" method="post"> <!-- without the method, the default is $_GET. -->
						<div class="form-group">
						  <input type="email" class="form-control" name="loginEmail" id="loginEmail" value="<?php echo $loginEmail ?>" placeholder="Email" />
						</div>
						<div class="form-group">
						  <input type="password" class="form-control" name="loginPassword" value="<?php echo $loginPassword ?>" placeholder="Password" /> <!-- addslashes escapes characters like " that would break the HTML. -->
						</div>
						<input type="submit" class="btn btn-success" name="submit" value="Log In"/>
					 </form>
				</div>
				
			</div>
			
		</div>
		
		<div class="container bg">
		
			<div class="row">
			
				<div class="col-md-6 col-md-offset-3 center margin-top">	
					<?php
						if ($errorMessage) echo $errorMessage;		
						if ($message) echo $message;
					?>
				</div>
				
				<div class="col-md-6 col-md-offset-3 content center">
					
					<h1 class="center white shadow"><b>Secret Diary</b></h1>
					
					<p class="center white shadow">Your own private diary, wherever you go.</p>
					<p class="center white shadow">Interested? Sign up below.</p>
					
					<form method="post" class="form-inline"> <!-- without the method, the default is $_GET. -->
					
					<!-- Use input-group for single inputs and form-group when there are labels, inputs etc... -->
						<div class="form-group">
						  <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>" placeholder="Email"/> <!--  php echo addslashes($_POST["email"]); -->
						</div>
						
						<div class="form-group">
						  <input type="password" class="form-control" name="password" value="<?php echo $password ?>" placeholder="Password"/> <!-- addslashes escapes characters like " that would break the HTML. -->
						</div>
					
						<input type="submit" class="btn btn-success" name="submit" value="Sign Up"/>
					</form>
					<div class="gap"></div>
				</div>
				
			</div>
			
			<form > 
					
			</form> 
						
		</div>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="script.js"></script>

	</body>
</html>






