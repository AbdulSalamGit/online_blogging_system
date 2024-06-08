<?php 
	require_once("../../require/connection.php");
	if (isset($_REQUEST['add_category'])) {
		
		$title 			= $_POST['title'];
		$description 	= $_POST['description'];

		date_default_timezone_set("Asia/Karachi");
    	
		$category_status= 'InActive';

		$query = "INSERT INTO category(category_title, category_description, category_status) VALUES('$title', '$description', '$category_status' )";
		$result = mysqli_query($connection,$query);
		if ($result) {

			$message = 'Category has been inserted Successfully.....';
			header("location:../add_category.php?message=$message");
		}
		else{
			echo "Query Problem";
		}



		// echo "<pre>";
		// print_r($title);
		// echo " ";
		// print_r($description);
	}












 ?>