<?php 
/*
	File Name: disable_comments.php
	Author Name: Paul Bialo
	Web site name: Paul's Blogging Site
	File Description: Calls function to disable comments for blog post and redirects to index.
*/	
	include "functions/functions.php";
	include "get_login.php";
	disable_comments();
	$_SESSION['success_messages'] = "Blog comments closed!";
	header("Location: index.php");