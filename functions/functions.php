<?php
/*
    File Name: functions.php
    Author's name: Paul Bialo
    Web site name: Blogging Site
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

function check_email_address_exists($email_address){
	global $db;
	$query = "SELECT * FROM users WHERE email_address = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($email_address));
	$row_count = $stmt->rowCount();

	if (empty($row_count)) {
		$email_address_exists = false;
	} 
	else {
		$email_address_exists = true;
	}
	return $email_address_exists;
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

function get_user($id) {
	global $db;
	$query = "SELECT * FROM users WHERE id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($id));
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

function register_user($username, $password, $email_address) {
  global $db;
  $password = SHA1($password);
  $query = " INSERT INTO users (username, password, email_address) VALUES (?, ?, ?) ";
  $stmt = $db->prepare($query);
  $stmt->execute(array($username, $password, $email_address));
  
  $_SESSION['id'] = $db->lastInsertId();
}

function update_user($id, $email_address){
	global $db;
 	$query = "UPDATE users SET email_address = ? WHERE id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($email_address, $id));
}