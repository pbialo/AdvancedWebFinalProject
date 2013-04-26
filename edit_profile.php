<?php
/*
	File Name: edit_profile.php
	Author Name: Paul Bialo
	Web site name: Paul's Blogging Site
	File Description: Allows user to change their e-mail (for now)
*/


	include "functions/functions.php";
	include 'partials/get_login.php'; 
	include 'partials/html_header.php'; 

	$update_error = '';
	$username = '';

	$logged_in_profile = get_user($_SESSION['id']);
	$email_address = $logged_in_profile['email_address'];

	if (!empty($_POST)):
		if (empty($_POST['email_address'])):
		  	$update_error= "Please fill out all fields.";
		endif;

		if (empty($update_error)):
			if (check_email_address_exists($_POST['email_address'])):
				$update_error = "E-mail address already in use.";
				$_SESSION['messages'] = $update_error;
			else:
			 	update_user($logged_in_profile['id'], $_POST['email_address'], $_POST['password']);
			 	$_SESSION['messages'] = "Successfully updated profile.";
			 	header("Location: index.php");
				die;
			endif;
		else:
		 	$email_address = $_POST['email_address'];
		  	$_SESSION['messages'] = $update_error;
		endif;
	endif;
?>

<body>
	<?php include 'partials/header.php'; ?>
	<div class="row">
		<div class="main">
			<h2>
				Edit Profile (<?php echo htmlentities($logged_in_profile['username'])?>)
			</h2>		
			<?php include 'partials/error_messages.php'; ?>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<label>Email Address:</label>
				<input type="text" name="email_address" value="<?php echo $email_address ?>">
				<input type="submit" value="Update" class="button">
			</form>
		</div>
	</div>
	<?php include 'partials/footer.php'; ?>
    </body>
</html>