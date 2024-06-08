<?php 

  require_once("../../require/connection.php");
  if (isset($_REQUEST['user_id'])) {

  	$user_id = $_GET['user_id'];

  	$query = "UPDATE user SET role_id = 2 WHERE user_id = '$user_id' ";
  	$result = mysqli_query($connection, $query);
  	if ($result) {
  		
  		$message = "Role ID has been set of this ID $user_id  user";
  		header("location:../modify_user_role.php?message=$message");
  	}


  }







 ?>