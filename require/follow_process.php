<?php 
session_start();
require_once("connection.php");

if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $user_id = $user['user_id'];
        $status = "Followed";
        date_default_timezone_set("Asia/Karachi");
        $added_on = date('Y-m-d H:i:s');

        $query = "INSERT INTO following_blog(follower_id, blog_following_id, status, created_at, updated_at) VALUES('$user_id', '$blog_id', '$status', '$added_on', '$added_on')";
        $result = mysqli_query($connection, $query);

        if ($result) {
          header("location:../index.php");
        } else {
            echo "Invalid";
        }
    } else {
        echo "User not logged in.";
    }
} else {
    echo "Invalid request.";
}

// Close the connection
$connection->close();
?>
