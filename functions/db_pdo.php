<?php
/*
    File Name: pdo.php
    Author name: Paul Bialo
    Web Site Name: Paul's Blogging Site
    File Description: Database connection PDO that is used throughout
*/

	$db= new PDO("mysql:host=localhost;dbname=blog", "root", "password");