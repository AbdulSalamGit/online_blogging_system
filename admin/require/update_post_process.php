<?php 
	require_once("../../require/connection.php");

	if (isset($_REQUEST['update_post'])) {

		$post_title 		= $_POST['post_title'];
		$post_summary 		= $_POST['post_summary'];
		$post_description 	= $_POST['description'];
		$category 			= $_POST['category_id'];
		$blog_id 			= $_POST['blog_id'];
		$post_id 			= $_POST['post_id'];
		$image_name         = $_FILES['image']['name'];
    	$tmp_name           = $_FILES['image']['tmp_name'];

    	move_uploaded_file($tmp_name, "../../upload_images/" . $image_name);

    	$query = "UPDATE post SET blog_id='$blog_id', post_title ='$post_title', post_summary ='$post_summary', post_description='$post_description', featured_image = '$image_name' WHERE post_id = '$post_id'";
    	$result = mysqli_query($connection,$query);
    	if ($result) {
    		
    		$message = "data has been updated successfully!....";
    		header("location:../view_all_post.php?message=$message");
    		
    	}
    	else{
    		echo "Invalid";
    	}





		// echo "<pre>";
		// print_r($post_title);
		// echo "<br>";
		// print_r($post_summary);
		// echo "<br>";
		// print_r($post_description);
		// echo "<br>";
		// print_r($category);
		// echo "<br>";
		// print_r($blog);
		// echo "<br>";
		// print_r($post_id);
		


	}








 ?>