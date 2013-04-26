<?php 
/*
	File Name: register.php
	Author Name: Paul Bialo
	Web site name: Paul's Blogging Site
	File Description: The page that allows the user to register for the system. 
*/


	include "functions/functions.php";
	include 'partials/html_header.php'; 

	$register_error = '';
	$username = '';
	$email_address = '';

	if (!empty($_POST)):
		//Checks if form was submitted without blank fields
		if (empty($_POST['username']) or empty($_POST['email_address']) or empty($_POST['password']) or empty($_POST['password_confirm'])):
		  	$register_error= "Please fill out all fields.";
		endif;
		//Checks that both password fields match
		if ($_POST['password'] != $_POST['password_confirm']):
		  	$register_error = "Passwords do not match.";
		endif;
		if (empty($register_error)):
			//Checks if e-mail address is in use
			if (check_email_address_exists($_POST['email_address'])):
				$register_error = "E-mail address already in use.";
				$username = $_POST['username'];
				$password = $_POST['password'];
				$_SESSION['error_messages'] = $register_error;
			//Checks if username is in use
			elseif (check_username_exists($_POST['username'])):
				$register_error = "Username already in use.";
				$email_address = $_POST['email_address'];
				$password = $_POST['password'];
				$_SESSION['error_messages'] = $register_error;
			//Otherwise, add user to database
			else:
			 	register_user($_POST['username'], $_POST['password'], $_POST['email_address']);
			 	$_SESSION['success_messages'] = "Successfully registered";
			 	header("Location: index.php");
				die;
			endif;
		else:
		 	$email_address = $_POST['email_address'];
		  	$username = $_POST['username'];
		  	$_SESSION['error_messages'] = $register_error;
		endif;
	endif;
?>

<body>
	<?php include 'partials/header.php'; ?>
	<div class="row">
		<div class="main">
			<!-- Register form !-->	
			<h2>
				Register
			</h2>		
			<?php include 'partials/error_messages.php'; ?>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<label>Username:</label>
				<input type="text" name="username" value="<?php echo $username ?>">
				<label>Email Address:</label>
				<input type="text" name="email_address" value="<?php echo $email_address ?>">
				<label>Password:</label>
				<input type="password" name="password">
				<label>Confirm Password:</label>
				<input type="password" name="password_confirm">
				<input type="submit" value="Register" class="button">
			</form>
		</div>
	</div>
	<?php include 'partials/footer.php'; ?>
    </body>
</html>