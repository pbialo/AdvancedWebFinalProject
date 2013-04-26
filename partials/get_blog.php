<?php 
/*
	File Name: get_blog.php
	Author Name: Paul Bialo
	Web Site Name: Bloggin Site
	File Description: The page that gets the value for $blog_number
*/

	if (!empty($_POST)):
		$blog_number = $_POST['blog'];
	elseif (!empty($_GET['blog'])): 
		$blog_number = $_GET['blog'];
	else :
		set_message("error", "Invalid survey id.");
		header('Location: index.php');
		die;
	endif;
	$blog = get_blog($blog_number);