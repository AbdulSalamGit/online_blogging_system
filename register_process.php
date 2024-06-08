<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once("require/connection.php");

if (isset($_REQUEST['register'])) {
    $fname 				= $_POST['name'];
    $last_name 			= $_POST['lname'];
    $email 				= $_POST['email'];
    $password 			= $_POST['password'];
    $gender 			= $_POST['gender'];
    $dob 				= $_POST['dob'];
    $home_town 			= $_POST['home_town'];
    $name 				= $_FILES['image']['name']; 
    $tmp_name 			= $_FILES['image']['tmp_name']; 

    $flag = true;

    $fname_patt 		= "/^[A-Z]{1}[a-z]{2,}$/";
    $lname_patt 		= "/^[A-Z]{1}[a-z]{2,}$/";
    $email_pattern 		= "/^[a-z]+\d*[@]{1}[a-z]+[.]{1}(com|net){1}$/";
    $password_patt 		= "/^[A-z0-9@.#$%_]{5,20}$/";
    $dob_patt 			= "/^\d{4}-\d{2}-\d{2}$/"; // YYYY-MM-DD format
    $dob_pattern 		= "/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/";

    $first_name_msg 	= null;
    $last_name_msg 		= null;
    $email_msg 			= null;
    $password_msg 		= null;
    $gender_msg 		= null;
    $image_msg 			= null;
    $date_of_birth_msg 	= null;
    $gender_msg 		= null;
    $message 			= null;
    $home_town_message  = null;

    if ($fname === "") {
        $flag = false;
        $first_name_msg = "Missing Name Field  ..! ";
    } else {
        $first_name_msg = "";
        if (!(preg_match($fname_patt, $fname))) {
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

    if ($name === "") {
        $flag = false;
        $image_msg = "Missing Picture Field ..! ";
    } 
    
    if ($home_town=== "") {
        $flag = false;
        $home_town_message = "Missing Picture Field ..! ";
    }

    if ($flag == true) {

        date_default_timezone_set("asia/Karachi");
        $added_on = date('l jS F Y h:i:s A');
        $role_id = 2;

        move_uploaded_file($tmp_name, "upload_images/" . $name);
        $query = "INSERT INTO user(role_id, first_name, last_name, email, password, gender, date_of_birth, user_image, address) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)";

        $statement = mysqli_prepare($connection, $query);
        if ($statement) {
            mysqli_stmt_bind_param($statement, 'issssssss',$role_id, $fname, $last_name, $email, $password, $gender, $dob, $name, $home_town);
            $result = mysqli_stmt_execute($statement);
            if ($result) {
                require 'PHPMailer-master/src/PHPMailer.php';
                require 'PHPMailer-master/src/SMTP.php';
                require 'PHPMailer-master/src/Exception.php';

                $subject        = "HIST ";
                $message        = "Registration has been done Successfully Please Wait For Another Account Activation Email..!";

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host         = 'smtp.gmail.com';
                $mail->Port         = 587;
                $mail->SMTPSecure   = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->SMTPAuth     = true;

                $mail->Username     = 'abdulsalamqambrani029@gmail.com';
                $mail->Password     = 'edhawnmfzkfkhjbt';

                $mail->setFrom('abdulsalamqambrani029@gmail.com', $subject);
                $mail->addReplyTo('abdulsalamqambrani029@gmail.com', 'ABC');
                $mail->addAddress($email, 'ADMIN');
                
                $mail->Subject      = $subject;
                $mail->isHTML(true);
                $mail->Body         = $message;

                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {


                        $message = "Your email has been sent and you wil recieve activative mail ";
  						header("location:index.php?message=$message");
                   
                    exit();
                }
            } else {
                echo "<span style='color:red;'>Your Record has not been registered....!</span>";
            }
        } else {
            echo "<span style='color:red;'>Error preparing the statement: " . mysqli_error($connection) . "</span>";
        }
    }


    
}
?>
