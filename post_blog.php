<?php
/*
	File Name: post_blog.php
	Author Name: Paul Bialo
	Web site name: Paul's Blogging Site
	File Description: Allows a user to post a blog
*/


	include "functions/functions.php";
	include 'partials/get_login.php'; 
	include 'partials/html_header.php'; 

	$blog_error = '';
	$blog_title = '';
	$blog_content = '';

	$logged_in_profile = get_user($_SESSION['id']);
	$email_address = $logged_in_profile['email_address'];

	//Checks if fields were all filled in
	if (!empty($_POST)):
		if (empty($_POST['blog_title']) or (empty($_POST['blog_content']))):
		  	$blog_error= "Please fill out all fields.";
		endif;
		//New blog is entered to database if so
		if (empty($blog_error)):
		 	post_blog($logged_in_profile['id'], $_POST['blog_title'], $_POST['blog_content']);
		 	$_SESSION['success_messages'] = "New blog posted.";
		 	header("Location: index.php");
			die;
		else:
		 	$blog_title = $_POST['blog_title'];
		 	$blog_content= $_POST['blog_content'];
		  	$_SESSION['error_messages'] = $blog_error;
		endif;
	endif;
?>

<body>
	<?php include 'partials/header.php'; ?>
	<section>
		<div class="row">
			<?php 
				include 'partials/success_messages.php'; 
				include 'partials/error_messages.php';
			?>
			<!-- Post blog form !-->			
			<h2>
				Post New Blog
			</h2>		
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<label>Blog Title:</label>
				<input type="text" name="blog_title" value="<?php echo $blog_title ?>">
				<label>Blog Content:</label>
				<textarea rows="10" cols="50" name="blog_content"><?php echo $blog_content ?></textarea>
				<input type="submit" value="Post Blog" class="button">
			</form>
		</div>
	</section>
	<?php include 'partials/footer.php'; ?>
    </body>
</html>