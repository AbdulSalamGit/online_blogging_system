<?php 
      require_once("admin_header.php");
      require_once("../require/connection.php");

      $user = $_SESSION['user'];

      
?>
   
    <div class="wrapper">
       <?php require_once("sidebar.php"); ?>
      <div class="main bg-light">
         <div class="container-fluid admin_profile">
            <div class="row">
               <div align="center">
                  <?php 
                     if (isset($_GET['message'])) {
                        echo $message = $_GET['message'];
                     }
                   ?>
               </div>
              <h1 class="text-center text-uppercase mt-5">Admin Profile</h1>
              <div class="col-lg-4">  </div>
               <div class="col-sm-12 col-lg-6 ">
                  <!-- <h3 class="text-center">My Profile</h3> -->
                  <table class="table table-borderless border border-1  table-light">
                       <thead>
                         <tr>
                           
                         </tr>
                       </thead>
                       <tbody>
                        <tr>
                           <th>ADMIN IMAGE</th>
                           <td>
                              <img src="../upload_images/<?= $user['user_image']; ?>" alt="User Image" width="200" height="170">
                           </td>
                         </tr>
                          <tr>
                           <th colspan="">First Name</th>
                           <td><?= $user['first_name']; ?></td>
                         </tr>
                          <tr>
                           <th >Last Name</th>
                           <td ><?= $user['last_name']; ?></td>
                         </tr>
                          <tr>
                           <th >Email</th>
                           <td ><?= $user['email']; ?></td>
                         </tr>
                          <tr>
                           <th >Gender</th>
                           <td ><?= $user['gender']; ?></td>
                         </tr>
                          <tr>
                           <th>Date of Birth</th>
                           <td><?= $user['date_of_birth']; ?></td>
                         </tr>
                          <tr>
                           <th>Home Town</th>
                           <td><?= $user['address']; ?></td>
                         </tr>
                          

                       </tbody>

                  </table>
                 
                     
                  <div class="modify" align="center">
                     <button class="btn btn-primary form-control-plaintext" ><a href="update_admin_profile.php">Modify</a></button>
                     <!-- <button class="btn btn-primary" ><a href="change_password.php">Change Password</a></button> -->
                  </div>

               </div>
               <div class="col-lg-2"></div>
            </div>
         </div>
      </div>
    </div>
<?php require_once("footer.php") ?>