<?php
/*
    File Name: functions.php
    Author's name: Paul Bialo
    Web Site Name: Paul's Blogging Site
    File Description: Includes the functions called
*/

session_start();
require "functions/db_pdo.php";
date_default_timezone_set('America/New_York');	

//Collects error messages that will be displayed
function get_error_messages() {
    $messages_array = '';
    if (isset($_SESSION['error_messages'])) :
        $messages_array = $_SESSION['error_messages'];
        unset($_SESSION['error_messages']);        
    endif;
    return $messages_array;
}

//Collects success messages that will be displayed
function get_success_messages() {
    $messages_array = '';
    if (isset($_SESSION['success_messages'])) :
        $messages_array = $_SESSION['success_messages'];
        unset($_SESSION['success_messages']);        
    endif;
    return $messages_array;
}

//Checks if the username is found in the users table
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

//Checks if the email address is found in the users table
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

//Checks if the password entered by the user matches the password in the users table
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

//Checks if the 'id' Session variable is set to determine if user is logged in
function logged_in(){
	if (empty($_SESSION['id'])) { 
		return false;
	}
	else{
		return true;
	}
}

//Pulls all the data for one user by id
function get_user($id) {
	global $db;
	$query = "SELECT * FROM users WHERE id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($id));
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

//Returns just the user's e-mail address
function get_email_address($id) {
	global $db;
	$query = "SELECT * FROM users WHERE id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($id));
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user['email_address'];
}

//Returns just the user's username
function get_username($id) {
	global $db;
	$query = "SELECT * FROM users WHERE id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($id));
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user['username'];
}

//Add a record (user) to the users table
function register_user($username, $password, $email_address) {
	global $db;
	$password = SHA1($password);
	$query = " INSERT INTO users (username, password, email_address) VALUES (?, ?, ?) ";
	$stmt = $db->prepare($query);
	$stmt->execute(array($username, $password, $email_address));
  	$_SESSION['id'] = $db->lastInsertId();
}

//Update user details such as e-mail address
function update_user($id, $email_address){
	global $db;
 	$query = "UPDATE users SET email_address = ? WHERE id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($email_address, $id));
}

//Returns an array that contains all of the blogs in the blog table
function get_blogs() {
	global $db;
	$query = "SELECT * FROM blogs ORDER BY blog_date DESC";
	$stmt = $db->query($query);
	$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $blogs;
}

//Return a blog with a specified id
function get_blog($blog_id) {
	global $db;
	$query = "SELECT * FROM blogs where id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($blog_id));
	$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $blogs[0];
}

//Add a record (blog) to the blogs table
function post_blog($username_id, $blog_title, $blog_content) {
	global $db;
	$query = "INSERT INTO blogs (username_id, blog_title, blog_content, blog_date) VALUES (?, ?, ?, UNIX_TIMESTAMP());";
	$stmt = $db->prepare($query);
	$stmt->execute(array($username_id, $blog_title, $blog_content));
}

//Returns an array of all of the comments for a given blog
function get_comments($blog_id) {
	global $db;
	$query = "SELECT * FROM comments WHERE blog_id = ? ORDER BY comment_date ASC";
	$stmt = $db->prepare($query);
	$stmt->execute(array($blog_id));
	$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $comments;
}

//Add a record (comment) into the comments table
function post_comment($username_id, $blog_id, $comment){
	global $db;
	$query = "INSERT INTO comments (username_id, blog_id, comment, comment_date) VALUES (?, ?, ?, UNIX_TIMESTAMP());";
	$stmt = $db->prepare($query);
	$stmt->execute(array($username_id, $blog_id, $comment));
}

//Returns how many comments a blog post has
function count_comments($blog_id){
	$comments = get_comments($blog_id);
	return count($comments);
}

//Returns whether or not a blog is open to new comments
function check_comments_allowed($blog_id){
	$blog = get_blog($blog_id);
	return $blog['comments_allowed'];
}

//Sets a blog record to disallow further comments
function disable_comments(){
	global $db;
	$query = "UPDATE blogs SET comments_allowed = 0 WHERE id = ?";
	$stmt = $db->prepare($query);
	$stmt->execute(array($_SESSION['blog_id']));
}

//Checks to see if user that is logged in is the author of a given blog
function check_if_blog_author($blog_id){
	global $db;
	$blog = get_blog($blog_id);
	if ($blog['username_id'] == $_SESSION['id']){
		return true;
	}
	else{
		return false;
	}

}