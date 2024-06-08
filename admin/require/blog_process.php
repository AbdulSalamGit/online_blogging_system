<?php 
session_start();
require_once("../../require/connection.php");

if (isset($_POST['add_blog'])) {
    $title 			= $_POST['blog_title'];
    $post_per_page  = $_POST['post_per_page'];
    $name 			= $_FILES['image']['name'];
    $tmp_name 		= $_FILES['image']['tmp_name'];
    $upload_dir 	= '../../upload_images/'; 
    $target_file 	= $upload_dir . basename($name);

    date_default_timezone_set("Asia/Karachi");
    $added_on 		= date('l jS F Y h:i:s A');
    $user 			= $_SESSION['user'];
    $user_id 		= $user['user_id'];
    $blog_status    = "InActive";

    date_default_timezone_set("Asia/Karachi");
    $update_on = date('Y-m-d H:i:s');

    
    if (move_uploaded_file($tmp_name, $target_file)) {
        $query = "INSERT INTO blog (user_id , blog_title, post_per_page, blog_background_image, blog_status, updated_at) VALUES (?, ?, ?,?,?,?)";
        $statement = mysqli_prepare($connection, $query);

        if ($statement) {
            mysqli_stmt_bind_param($statement, 'isisss',$user_id, $title, $post_per_page, $name, $blog_status,$update_on);
            $result = mysqli_stmt_execute($statement);

            if ($result) {
                
            	$message = "Blog is created successfully";
                header("location:../view_blogs.php?message=$message");
            } else {
                echo "Database Insertion Problem: " . mysqli_error($connection);
            }
        } else {
            echo "Query Preparation Problem: " . mysqli_error($connection);
        }
    } else {
        echo "File upload failed.";
    }

    // echo $user_id;
}
?>
