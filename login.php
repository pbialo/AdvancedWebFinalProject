<?php
/*
	File Name: login.php
	Author Name: Paul Bialo
	Web site name: Paul's Blogging Site
	File Description: Login page
*/
	include "functions/functions.php";
	include 'partials/html_header.php'; 
	?>

	<body>

		<?php 
			include 'partials/header.php';
			include 'partials/error_messages.php';
			include 'partials/success_messages.php';
			$login_error = '';
			//Checks if form was properly submitted
			if (!empty($_POST)):
		 		if (empty($_POST['username']) or (empty($_POST['password']))):
					$login_error = "Login failed. Try again.";
		  		endif;
			  	//If both fields are entered, check the username and password against the database
			 	$username = $_POST['username'];
			  	if (empty($login_error)) :
					$username_exists = check_username_exists($_POST['username']);
					if ($username_exists) :
				 		$username_match = check_password_correct($_POST['username'], $_POST['password']);
				  		if ($username_match) :
							$_SESSION['id'] = $username_match;
							$_SESSION['success_messages'] = "Logged in!";
							header('Location: index.php');
							die;
						//Otherwise give errors since username or email address were not found  or incorrect password
				 		else:
							$login_error = "Login failed. Try again.";
				  		endif;
					else :
				  		$login_error = "Login failed. Try again.";
					endif;
			  	endif;
			endif;
			$_SESSION['error_messages'] = $login_error;
		?>

		<div class="row">
			<div class="main">
				<!-- Log-in form !-->
				<h2>
					Log-in
				</h2>
				<?php include 'partials/error_messages.php'; ?>
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