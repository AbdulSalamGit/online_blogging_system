<?php
    require_once("../require/connection.php");
if (isset($_REQUEST['submit'])) {
    
    $user_id            = $_POST['user_id'];
    $first_name         = $_POST['name'];
    $last_name          = $_POST['lname'];
    $email              = $_POST['email'];
    $password           = $_POST['password'];
    $gender             = $_POST['gender'];
    $date_of_birth      = $_POST['date'];
    $home_town          = $_POST['home_town'];
    // $name               = $_FILES['image']['name']; 
    // $tmp_name           = $_FILES['image']['tmp_name'];


    $flag = true;

    $fname_patt         = "/^[A-Z]{1}[a-z]{2,}$/";
    $lname_patt         = "/^[A-Z]{1}[a-z]{2,}$/";
    $email_pattern      = "/^[a-z]+\d*[@]{1}[a-z]+[.]{1}(com|net){1}$/";
    $password_patt      = "/^[A-z0-9@.#$%_]{5,20}$/";
    $dob_patt           = "/^\d{4}-\d{2}-\d{2}$/"; // YYYY-MM-DD format
    $image_pattern      = '/\.(jpg|jpeg|png|gif)$/i';
    $dob_pattern        = "/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/";

    $first_name_msg     = null;
    $last_name_msg      = null;
    $email_msg          = null;
    $password_msg       = null;
    $gender_msg         = null;
    $image_msg          = null;
    $date_of_birth_msg  = null;
    $gender_msg         = null;
    $message            = null;
    $home_town_message  = null;



    if ($first_name === "") {
        $flag = false;
        $first_name_msg = "Missing Name Field  ..! ";
    } else {
        $first_name_msg = "";
        if (!(preg_match($fname_patt, $first_name))) {
            $flag = false;
            $first_name_msg = "First Name must be like Ali|Bilal|Ahmed etc..! ";
        }
    }

    if ($last_name !== "") {
        if (!(preg_match($lname_patt, $last_name))) {
            $flag = false;
            $last_name_msg = "Last Name must be like Khan|Shaikh etc..! ";
        }
    } else {
        $last_name_msg = "";
    }

    if ($email === "") {
        $flag = false;
        $email_msg = "Missing Email Field ..!  ";
    } else {
        $email_msg = "";
        if (!(preg_match($email_pattern, $email))) {
            $flag = false;
            $email_msg = "Email must be like ali@example.com|net ali12@example.com|net etc..!";
        }
    }

    if ($password === "") {
        $flag = false;
        $password_msg = "Missing password Field..!  ";
    } else {
        $password_msg = "";
        if (!(preg_match($password_patt, $password))) {
            $flag = false;
            $password_msg = "Password must be like Abs123@";
        }
    }

    if ($home_town=== "") {
        $flag = false;
        $home_town_message = "Missing Picture Field ..! ";
    }

     if ($flag == true) {

        date_default_timezone_set("Asia/Karachi");
        $update_on = date('Y-m-d H:i:s');
        // move_uploaded_file($tmp_name, "../upload_images/" . $name);

        $query = "UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', password='$password', gender='$gender', date_of_birth='$date_of_birth', address='$home_town' ,  updated_at = '$update_on' WHERE user_id=  '$user_id' ";
        $result     = mysqli_query($connection, $query);

        if ($result) {

            header("location: view_users.php?message=Your data has been updated");
        } else {
            echo "Error updating data: " . mysqli_error($connection);
        }

    }
}
 
?>
