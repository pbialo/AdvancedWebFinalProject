<?php 
/*
	File Name: get_login.php
	Author Name: Paul Bialo
	Web site name: Paul's Blogging Site
	File Description: Makes sure user is logged in to access most pages
*/
	if (empty($_SESSION['id'])) :
		session_destroy();
		session_start();	
		$_SESSION['error_messages'] = "You must log in to view this page.";
	  	header('Location: login.php');
	  	die;
	endif;