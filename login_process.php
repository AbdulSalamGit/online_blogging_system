<?php
    session_start();
    require_once("require/connection.php");

    if (isset($_REQUEST["login"])) {
        $email      = $_POST['email'];
        $password   = $_POST['password'];

        $query      = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result     = mysqli_query($connection, $query);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);

            if ($row['role_id'] == 1) {
                $_SESSION['user'] = $row;
                header("Location: admin/dashboard.php");
                exit();
            } elseif ($row['role_id'] == 2) {
                if ($row['is_active'] == 'Active') {

                    $_SESSION['user'] = $row;
                    header("Location: index.php");
                    exit();

                    // $message = "<h5 style='background-color:#16a085'>You are Active</h5>";
                } else {
                    $message = "<h5 style='background-color:red'>You are not Active Yet......</h5>";
                    header("Location: index.php?message=" . urlencode($message));
                    exit();
                }
                
            }
        } else {
            $message = "<h5 style='background-color:red'>Your Email Or password is not Valid. Please try again!</h5>";
            header("Location: index.php?message=" . urlencode($message));
            exit();
        }
    }
?>
