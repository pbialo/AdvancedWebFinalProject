<?php 
/*
	File Name: disable_comments.php
	Author Name: Paul Bialo
	Web Site Name: Blogging Site
	File Description: Calls function to disable comments for blog post and redirects to index.
*/
	include "functions/functions.php";
	include 'partials/get_login.php';
	disable_comments();
	header("Location: index.php");