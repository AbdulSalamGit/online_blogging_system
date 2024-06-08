<?php 
	require_once("../../require/connection.php");

	if (isset($_REQUEST['blog_id'])) {
		$blog_id = $_GET['blog_id'];

		$query = "DELETE FROM blog WHERE blog_id = '$blog_id'";
		$result = mysqli_query($connection,$query);
		if ($result) {
			$message = "Blog delete has been successfully";
			header("location:../view_blogs.php?message=$message");
		}
	}











 ?>