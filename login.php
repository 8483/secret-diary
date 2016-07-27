<?php
	session_start();
	
	// It might be a good idea to crete a separate variables.php file for all the isset variables and include it everywhere.
	
	$logout = isset($_GET['logout']) ? $_GET['logout'] : '';
	$sessionId = isset($_POST['id']) ? $_POST['id'] : '';
	
	$message ="";
	
	if ($logout == 1 AND $sessionId) {
		session_destroy();
		$message =  "You have been logged out. Have a nice day.</div>";
	}
	
	include("connection.php");
	
	$error = ""; $errorMessage ="";
	
	$post = isset($_POST['submit']) ? $_POST['submit'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : ''; // isset solves the UNDEFINED INDEX NOTICE PROBLEM. They need to be defined outside the POST.
	$password = isset($_POST['password']) ? $_POST['password'] : ''; // ? is an if statement. Ex. IF ? DO THIS : ELSE THIS ; i.e. if the variable is set ? then post it : else leave it empty ="";
	
	if ($post == "Sign Up") { // Checks for form submission if its the type of Sign Up.
		
		if ( ! $email) $error .= "Please enter your email.<br/>"; // Checks if mail is submitted.
			else if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) $error .= "Please enter a valid email address.<br/>"; // Validates the email.
		
		if ( ! $password) $error .= "Please enter your password.<br/>";
			else {
				
				if (strlen($password) < 8) $error .= "Please enter a password with at least 8 characters.<br/>"; // Checks the length of the string i.e. Is the password at least 8 characters.
				//if ( ! preg_match('`[A-Z]`', $password)) $error .= "Please include at least one capital letter in your password.<br/>"; // Uses regex to check for capital letters.
			
			}
			
		if ($error) $errorMessage = $error;
		
			else {
				
				$email = mysqli_real_escape_string( $link, $email);
				//echo $mail;
				
				$query = " SELECT * FROM users WHERE email ='" .$email."' " ; // ALWAYS use the escape string in order to prevent SQL injections. !******* !!!!!!!!!!! Be careful with white spaces in the email=' '. It wont work if not properly set. !!!!!!!!!! ex. email='ivan' vs email=' ivan '     "**************
				//$query = " SELECT * FROM users WHERE email = ' ivan@gmail.com ' "; // Checks for a specific email i.e. simulates the above.
				
				// echo $query;	
				// echo "<br/><br/>" . $_POST["email"]; // Checks if the POST works.
				// echo "<br/><br/>" . mysqli_real_escape_string( $link, $_POST["email"]); // Checks if the escaped POST works.
				
				//$query = "SELECT * FROM users "; // Checks if the query works with the database.
				
				$result = mysqli_query($link, $query); // Runs the query and stores it in the result variable.
				
				/* echo "<br/><br/>";
				while($row = mysqli_fetch_array($result)) {
						print_r($row); echo"<br/><br/>";
					}
				
				print_r($result); */
				
				$results = mysqli_num_rows($result); // Checks if there are any rows.
				
				if ($results) $errorMessage = "Email already registered. Do you want to log in?";
					else {
						$query = "INSERT INTO users (email, password) VALUES ('".$email."','".md5(md5($email . $password))."') ";
						mysqli_query($link, $query);
						$message = "Sign up successful!";
						$_SESSION["id"] = mysqli_insert_id($link); // This sets the session to the last created user i.e. the one that just signed up.
						
						header("location:main.php"); // Redirect to logged in page.
					}			
			}
	}
	
	$loginEmail = isset($_POST['loginEmail']) ? $_POST['loginEmail'] : ''; // They need to be defined outside the POST.
	$loginPassword = isset($_POST['loginPassword']) ? $_POST['loginPassword'] : '';
	
	if ($post == "Log In") { // Checks for form submission if its the type of Log In.
		
		$loginEmail = mysqli_real_escape_string( $link, $loginEmail);
		$query = "SELECT * FROM users WHERE email ='" .$loginEmail."' AND password ='" .md5(md5($loginEmail . $loginPassword))."' LIMIT 1";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		
		if($row) {
			$_SESSION["id"] = $row["id"];	
			// print_r($_SESSION); // Shows the session id which means the log in was successful.
			
			header("location:main.php"); // Redirect to logged in page.
			
		} else {
			$errorMessage = 'User not found with that email and password. Please try again.';
		}
	}
	
	if ($errorMessage) $errorMessage = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">x</button>' . addslashes($errorMessage) ."</div>";
	if ($message) $message = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert">x</button>' . addslashes($message) ."</div>";
	
?>