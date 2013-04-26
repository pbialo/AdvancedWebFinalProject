<?php
/*
	File Name: post_comment.php
	Author Name: Paul Bialo
	Web Site Name: Blogging Stie
	File Description: Allows a user to post a blog
*/


	include "functions/functions.php";
	include 'partials/get_login.php'; 
	include 'partials/html_header.php'; 

	$comment_error = '';

	$logged_in_profile = get_user($_SESSION['id']);
	$email_address = $logged_in_profile['email_address'];

	if (!empty($_POST)):
		if (empty($_POST['new_comment'])):
		  	$comment_error= "Comment can't be blank!";
		endif;
		if (empty($comment_error)):
		 	//post_comment($logged_in_profile['id'], $blog['blog_id'], $_POST['new_comment']);
		 	post_comment($logged_in_profile['id'], $_SESSION['blog_id'], $_POST['new_comment']);
		 	$_SESSION['success_messages'] = "Comment posted.";
		 	header("Location: index.php");
			die;
		else:
		  	$_SESSION['error_messages'] = $comment_error;
		endif;
	endif; //($username_id, $blog_id, $comment)
?>

<body>
	<?php include 'partials/header.php'; ?>
	<section>
		<div class="row">
			<?php 
				include 'partials/success_messages.php'; 
				include 'partials/error_messages.php';
			?>			
			<h2>
				Post Comment
			</h2>		
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<label>Leave a comment:</label>
				<textarea rows="10" cols="50" name="new_comment"></textarea>
				<input type="submit" value="Submit" class="button">
			</form>
		</div>
	</section>
	<?php include 'partials/footer.php'; ?>
    </body>
</html>