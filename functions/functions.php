<?php
/*
    File Name: functions.php
    Author's name: Paul Bialo
    Web site name: Blogging Site
    File Description: Includes the functions called
*/

session_start();
require "functions/db_pdo.php";
date_default_timezone_set('America/New_York');	

$errors = array();
$field_errors = array();

function get_error_messages() {
    $messages_array = '';
    if (isset($_SESSION['error_messages'])) :
        $messages_array = $_SESSION['error_messages'];
        unset($_SESSION['error_messages']);        
    endif;
    return $messages_array;
}

function get_success_messages() {
    $messages_array = '';
    if (isset($_SESSION['success_messages'])) :
        $messages_array = $_SESSION['success_messages'];
        unset($_SESSION['success_messages']);        
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

function get_email_address($id) {
	global $db;
	$query = "SELECT * FROM users WHERE id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($id));
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user['email_address'];
}

function get_username($id) {
	global $db;
	$query = "SELECT * FROM users WHERE id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($id));
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user['username'];
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

function get_blogs() {
	global $db;
	$query = "SELECT * FROM blogs ORDER BY blog_date DESC";
	$stmt = $db->query($query);
	$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $blogs;
}

function get_blog($blog_id) {
	global $db;
	$query = "SELECT * FROM blogs where id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($blog_id));
	$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $blogs[0];
}


function post_blog($username_id, $blog_title, $blog_content) {
	global $db;
	$query = "INSERT INTO blogs (username_id, blog_title, blog_content, blog_date) VALUES (?, ?, ?, UNIX_TIMESTAMP());";
	$stmt = $db->prepare($query);
	$stmt->execute(array($username_id, $blog_title, $blog_content));
}
