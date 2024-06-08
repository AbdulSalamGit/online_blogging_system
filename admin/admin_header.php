<?php
    // error_reporting(false); 
    session_start();
    require_once("../require/connection.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Blogging Webpage</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" src="js/jquery.min.js" ></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all_small_componets.css">
    <style>
      
    </style>
</head>

<body>

	<div class="container-fluid px-0" >
		<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Online Blogging Web Page</a> 
          <a href="../index.php" class="navbar-brand ">HOME</a>   
    	</div>
    	 <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>     
         </div>
         <div class="sidebar-item">
            <a href="admin_profile.php" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span>
                    <?php 
                         if(!isset($_SESSION['user'])) {
                          header("Location:../index.php");
                          exit();
                        }else{
                            $user = $_SESSION['user'];
                            echo "Welcome, " . $user['first_name'] . " " . $user['last_name'] . "!";
                        }

                    ?>
                </span>
                <img src="../upload_images/<?php echo $user["user_image"]; ?>" alt="User Image">
            </a>
        </div>
    </nav>
	</div>
  