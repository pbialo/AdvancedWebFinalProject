<?php
/*
	File Name: html_header.php
	Author Name: Paul Bialo
	Web Site Name: Blogging Site
	File Description: HTML header used throughout web site
*/  
	echo '
		<!doctype html>
		<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
		<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
		<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
		<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
		 
		<head>


			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

			<title>PB Blogging</title>
			<meta name="description" content="">
			<meta name="keywords" content="" />
			<meta name="author" content="Paul Bialo" />

			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			
			<!-- Boilerplate first then onto Base styles (Mobile First) and then other media queries  -->
			<link rel="stylesheet" href="css/base/boilerplate.css" media="screen">
			<link rel="stylesheet" href="css/base/style.css" media="screen">
			<link rel="stylesheet" href="css/base/min-480.css" media="only screen and (min-width: 480px)">
			<link rel="stylesheet" href="css/base/min-768.css" media="only screen and (min-width: 768px)">
			<link rel="stylesheet" href="css/base/desktop.css" media="only screen and (min-width: 1170px)">
					  
			<link rel="stylesheet" href="css/main.css" media="screen">
		  
			<script src="js/libs/modernizr-2.5.3.min.js"></script>    
			
			<!--[if lt IE 9]>
				<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
		   
		</head>
	'
;