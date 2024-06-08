<?php 
session_start();
require_once("../../require/connection.php");

if (isset($_POST['update_blog'])) {
    $title 			= $_POST['blog_title'];
    $blog_id        = $_POST['blog_id'];
    $name 			= $_FILES['image']['name'];
    $tmp_name 		= $_FILES['image']['tmp_name'];
    $upload_dir 	= '../../upload_images/'; 
    $target_file 	= $upload_dir . basename($name);

    date_default_timezone_set("Asia/Karachi");
    $added_on = date('Y-m-d H:i:s');

    $user 			= $_SESSION['user'];
    $user_id 		= $user['user_id'];

    $query = "UPDATE blog SET blog_title = '$title', blog_background_image='$name', updated_at = '$added_on'  WHERE blog_id = '$blog_id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $message= "Your Blog $title has been updated now!...";
        header("location:../view_blogs.php?message=$message");
    }else{
        echo"Invalid";
    }



}