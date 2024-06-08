<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once("../../require/connection.php");
    if (isset($_REQUEST['user_id'])) {
        $user_id = $_GET['user_id'];
        $user_email = $_GET['email'];

        $query = "UPDATE user SET is_active = 'InActive' WHERE user_id = '$user_id' ";
        $result = mysqli_query($connection, $query);
        if ($result) {
            header("location:../view_approve_user.php?message=<span style='color:red'>User $user_id has been deactivated.</span>");
            exit();
        } else {
            echo "Invalid";
        }
    }
?>
