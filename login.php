<?php
/*
	File Name: login.php
	Author Name: Paul Bialo
	Web Site Name: Blogging site
	File Description: Login page
*/
	include "functions/functions.php";


	$login_error = '';
	//Give an error if either field is empty:
	if (!empty($_POST)) :
	 	if (empty($_POST['username']) or (empty($_POST['password']))) :
			$login_error = "Login failed. Try again.";
	  	endif;

	  	//If both fields are entered, check the username and password against the database
	 	$username = $_POST['username'];
	  	if (empty($login_errors)) :
			$username_exists = check_username_exists($_POST['username']);
			if ($username_exists) :
		 		$username_match = check_password_correct($_POST['username'], $_POST['password']);
		  		if ($username_match) :
					$_SESSION['id'] = $username_match;
					header('Location: index.php');
					die;
		 		else:
					$login_error = "Login failed. Try again.";
		  		endif;
			else :
		  		$login_error = "Login failed. Try again.";
			endif;
	  	endif;
	endif;
	$_SESSION['messages'] = $login_error;

	include 'partials/html_header.php'; 
	?>

	  <body>

		  <?php include 'partials/header.php'; ?>
		  
		  <div class="row">
			<div class="login">
				<h2>
					Log-in
				</h2>
				<?php include 'partials/messages.php'; ?>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<label>Username: </label>
					<input type="text" name="username">
					<label>Password: </label>
					<input type="password" name="password">
					<input class="button" type="submit" value="Login">
				</form>
			</div>
		  <?php include 'partials/footer.php'; ?>
	  
	  </body>
	</html>