<?php 
/*
    File Name: logout.php
    Author's name: Paul Bialo
    Web site name: Paul Bialo's Personal Portfolio
    File Description: Destroys session and returns user to index.
*/
	include "functions/functions.php";
	session_destroy();
	session_start();
	header("Location: index.php");
	die;
