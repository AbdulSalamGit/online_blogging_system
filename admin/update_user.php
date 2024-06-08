<?php require_once("admin_header.php");
      require_once("update_user_process.php");
      require_once("../require/connection.php");


      if (isset($_GET['user_id'])) {

          $user_id = $_GET['user_id'];
         
          $query = "SELECT * FROM user WHERE user_id = '$user_id' ";
          $result = mysqli_query($connection, $query);

            
            if (!$result) {
              // die("Query Error: " . mysqli_error($conn));

              } else {

                $row =  mysqli_fetch_assoc($result);
          
?>
  <style>
    .update span{
      color: red;
    }
  </style>
    <div class="wrapper">
       <?php require_once("sidebar.php"); ?>
       <div class="main bg-light">
        
                <div class="container update" >
                  <div class="row justify-content-center">
                    <div class="col-lg-6">
                      <h1 class="text-center text-uppercase mt-3">Update Form</h1>
                      <hr>
                      
                      <div class="border border-2 p-3">
                        <form action="" method="POST">
                          <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $row['first_name']; ?>">
                            <span id="name_msg"><?=  $first_name_msg ??"";  ?></span>
                          </div>
                          
                          <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?= $row['last_name']; ?>">
                            <span id="lname_msg"><?=  $last_name_msg ??"";  ?></span>
                          </div>
                          
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $row['email']; ?>">
                             <span id="email_msg"><?=  $email_msg ??"";  ?></span>
                          </div>
                          
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $row['password']; ?>">
                             <span id="password_msg"><?= $password_msg ??""; ?></span>
                          </div>
                          <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="user_id" value="<?= $row['user_id']; ?>">
                          </div>
                          
                          <div class="mb-3">
                          <label for="gender" class="form-label">Gender</label>
                          <select class="form-select" id="gender" name="gender">
                              <option selected>Choose...</option>
                              <option value="male" <?= ($row['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                              <option value="female" <?= ($row['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                              <span id="gender_msg"><?= $gender_msg ??""; ?></span>
                            </select>

                          </div>
                          
                          <div class="mb-3">
                            <label for="date" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?= $row['date_of_birth']; ?>">
                            <span id="dob_msg"><?= $date_of_birth_msg ??""; ?></span>
                          </div>
                          
                          <!-- <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="image" value="<?= $row['user_image']; ?>" name="image">
                            <span id="image_msg"><?= $image_msg ??""; ?></span>
                          </div> -->
                          <div class="mb-3">
                            <label for="home_town" class="form-label">Home Town</label>
                            <input type="text" class="form-control" id="home_town" name="home_town"value="<?= $row['address']; ?>">
                            <span id="home_town_message"><?= $home_town_message ??""; ?></span>
                          </div>
                          
                          <button type="submit" class="btn btn-primary form-control bg-primary" name="submit">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
               
           <?php 

            }
          }
            ?>

       </div>


    </div>

<?php require_once("footer.php") ?>