<?php 
	session_start();
require_once("connection.php");

if (isset($_GET['submit'])) {

	$user = $_SESSION['user'];
	$user_id = $user['user_id'];
	$post_id = $_POST['post_id'];
	$comment = $_POST['comment'];

	echo "<pre>";
	print_r($user_id);
	echo "<br>";
	print_r($post_id);
	echo "<br>";
	print_r($comment_id);
	echo "<br>";






}





 ?>