<?php
require_once("../../require/connection.php");

if ($_REQUEST['flag'] == "toggle_user_status") {
    $blog_id = $_REQUEST['blog_id'];
    $status = $_REQUEST['status'];

    $query = "UPDATE blog SET blog_status='$status' WHERE blog_id = '$blog_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $response = array(
            'success' => true,
            'message' => "<b style='color:green'> The Blog ID: <span style='color:brown'>$blog_id</span> has been updated to $status successfully!</b>"
        );
    } else {
        $response = array(
            'success' => false,
            'message' => "<b style='color:red'>Blog status has not been updated. Please try again.</b>"
        );
    }

    echo json_encode($response);
} else if ($_REQUEST['flag'] == "delete_user") {
    $user_id = $_REQUEST['user_id'];

    $query = "DELETE FROM user WHERE user_id = '$user_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $response = array(
            'success' => true,
            'message' => "<b style='color:green'> The User ID: <span style='color:brown'>$user_id</span> has been deleted successfully!</b>"
        );
    } else {
        $response = array(
            'success' => false,
            'message' => "<b style='color:red'>User has not been deleted. Please try again.</b>"
        );
    }

    echo json_encode($response);
}
else if ($_REQUEST['flag'] == "toggle_post_status") {
    $post_id = $_REQUEST['post_id'];
    $status = $_REQUEST['status'];

    $query = "UPDATE post SET post_status='$status' WHERE post_id = '$post_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $response = array(
            'success' => true,
            'message' => "<b style='color:green'> The POST ID: <span style='color:brown'>$post_id</span> has been updated to $status successfully!</b>"
        );
    } else {
        $response = array(
            'success' => false,
            'message' => "<b style='color:red'>Post status has not been updated. Please try again.</b>"
        );
    }

    echo json_encode($response);
    exit;  // Ensure the script terminates here
}

?>
