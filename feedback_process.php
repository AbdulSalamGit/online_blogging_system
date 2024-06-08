<?php
	session_start();
	require_once("require/connection.php");
	if (isset($_REQUEST['submit'])) {
	 	
	 	$name 		= $_POST['name'];
	 	$email 		= $_POST['email'];
	 	$message 	= $_POST['message'];

	 	$user = $_SESSION['user'];
	 	$user_id = $user['user_id'];
	 	$query = "INSERT INTO user_feedback(user_id, user_name, user_email,  feedback) VALUES(?,?, ?, ?)";
	 	$statement = mysqli_prepare($connection, $query);
	 	mysqli_stmt_bind_param($statement,'isss',$user_id,$name,$email,$message);
	 	$result = mysqli_stmt_execute($statement);
	 	if ($result) {

	 		header("location:feedback.php?message=<span style='color:green;'>Your Record has been registered succeefully");
	 		exit();
	 	}
	 	else{
	 		echo"<span style='color:red;'>Your Record has been not registered....!";
	 	}
	 	




	 } 


 ?>