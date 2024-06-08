<?php require_once("../../require/connection.php");
	

	if (isset($_REQUEST['category_id'])) {
		$category_id =$_GET['category_id'];
		echo $category_id;
		$query = "UPDATE category SET category_status = 'Active' WHERE category_id = '$category_id' ";
		$result = mysqli_query($connection, $query);
		if ($result) {
			$message = "This ID $category_id has been active now";
			header("location:../view_categories.php?message=$message");
		}
		else{

		}
	}





 ?>