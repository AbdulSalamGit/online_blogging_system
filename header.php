<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Websites</title>
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/custome.css">
	<style>
		*{
			padding: 0;
			margin: 0;
		}
    .img img{
      width: 70px;
      height: 70px;
      border-radius: 50%;
    }
    .header h5{
      color: #fff;
      padding: 0 10px;
    }
    .logout{
      padding: 10px 0 0 10px;
    }
	</style>
</head>
<body>

	<div class="container-fluid px-0 header" >
		<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark" >
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Blogging</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse login" id="navbarColor01">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#about-us">About Us</a>
              </li>
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="index.php#health">Health</a></li>
                    <li><a class="dropdown-item" href="index.php#education">Education</a></li>
                    <li><a class="dropdown-item" href="index.php#politics">Politics</a></li>
                    <li><a class="dropdown-item" href="index.php#technical">Technical</a></li>
                    <li><a class="dropdown-item" href="index.php#">Entertainment</a></li>
                  </ul>
                </div>
              <li class="nav-item">
                <a class="nav-link" href="feedback.php">Contact Us</a>
              </li>
              
            </ul>

                  <?php 
                         if(!isset($_SESSION['user'])) {
                         ?>
                          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ModalForm">
                          Login
                        </button>
                         <button type="button" class="btn btn-info " data-bs-toggle="modal">
                          <a href="register.php" class="text-light">Register</a>
                        </button>

                         <?php
                        }else{
                            $user = $_SESSION['user'];
                            echo "<h5>Welcome: ".$user['first_name']." ".$user['last_name']."</h5>";
                            ?>
                             <div class="img">
                             <img src="upload_images/<?php echo $user["user_image"]; ?>" alt="User Image">
                             </div>
                             <div class="mb-3 logout">
                                <a href="logout.php" class="btn btn-outline-success">Logout</a>
                            </div>
                            <?php
                        }

                    ?>
                             
           

          </div>
        </div>
    </nav>

	</div><br><br>
 

  