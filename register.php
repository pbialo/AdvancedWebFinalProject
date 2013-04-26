<?php 
/*
	File Name: register.php
	Author Name: Paul Bialo
	Web Site Name: Blogging Site
	File Description: The page that allows the user to register for the system. 
*/


	include "functions/functions.php";
	include 'partials/html_header.php'; 

	$register_error = '';
	$username = '';
	$email_address = '';

	if (!empty($_POST)):
		if (empty($_POST['username']) or empty($_POST['email_address']) or empty($_POST['password']) or empty($_POST['password_confirm'])):
		  	$register_error= "Please fill out all fields.";
		endif;

		if ($_POST['password'] != $_POST['password_confirm']):
		  	$register_error = "Passwords do not match.";
		endif;
		

		if (empty($register_error)):
			if (check_email_address_exists($_POST['email_address'])):
				$register_error = "E-mail address already in use.";
				$username = $_POST['username'];
				$password = $_POST['password'];
				$_SESSION['messages'] = $register_error;
			elseif (check_username_exists($_POST['username'])):
				$register_error = "Username already in use.";
				$email_address = $_POST['email_address'];
				$password = $_POST['password'];
				$_SESSION['messages'] = $register_error;
			else:
			 	register_user($_POST['username'], $_POST['password'], $_POST['email_address']);
			 	$_SESSION['messages'] = "Successfully registered";
			 	header("Location: index.php");
				die;
			endif;
		else:
		 	$email_address = $_POST['email_address'];
		  	$username = $_POST['username'];
		  	$_SESSION['messages'] = $register_error;
		endif;
	endif;
?>

<body>
	<?php include 'partials/header.php'; ?>
	<div class="row">
		<div class="main">
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