<?php
/*
    File Name: functions.php
    Author's name: Paul Bialo
    Web site name: Paul Bialo's Personal Portfolio
    File Description: Includes the functions called
*/

session_start();
require "functions/db_pdo.php";

$errors = array();
$field_errors = array();

function get_messages() {
    $messages_array = '';
    if (isset($_SESSION['messages'])) :
        $messages_array = $_SESSION['messages'];
        unset($_SESSION['messages']);        
    endif;
    return $messages_array;
}

function check_username_exists($username){
	global $db;
	$query = "SELECT * FROM users WHERE username = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($username));
	$row_count = $stmt->rowCount();

	if (empty($row_count)) {
		$username_exists = false;
	} 
	else {
		$username_exists = true;
	}
	return $username_exists;
}

function check_password_correct($username, $password){
	global $db;
	$query = "SELECT * FROM users WHERE username = ? ";
	$stmt = $db->prepare($query);
	$stmt->execute(array($username));
	$username = $stmt->fetch(PDO::FETCH_ASSOC);
	$password = SHA1($password);

	if ($password == $username['password']){
		return $username['id'];
	}
	return false;
}

function logged_in(){
	if (empty($_SESSION['id'])) { 
		return false;
	}
	else{
		return true;
	}
}