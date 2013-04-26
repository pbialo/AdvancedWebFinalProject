<?php 
/*
	File Name: get_blog.php
	Author Name: Paul Bialo
	Web site name: Paul's Blogging Site
	File Description: The page that gets the value for $blog_number
*/

	if (!empty($_POST)):
		$blog_number = $_POST['blog'];
	elseif (!empty($_GET['blog'])): 
		$blog_number = $_GET['blog'];
	else:
		die;
	endif;
	$blog = get_blog($blog_number);

	if (empty($blog)):
		$blog_error = "Blog with this id not found. Try again.";
		$_SESSION['error_messages'] = $blog_error;
		header('Location: index.php');
	endif;