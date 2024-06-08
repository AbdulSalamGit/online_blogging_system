<?php 
      require_once("admin_header.php");
      require_once("../require/connection.php");
      require_once("admin_profile_process.php");

      $user = $_SESSION['user'];

      
?>
<style>
   .admin_profile span{
      color: red;
   }
</style>
   
    <div class="wrapper">
       <?php require_once("sidebar.php"); ?>
      <div class="main bg-light">
         <div class="container-fluid admin_profile">
            <div class="row">
              <h1 class="text-center text-uppercase mt-5">Admin Update Profile</h1>
              <div class="col-lg-4">  </div>
               <div class="col-sm-12 col-lg-6 ">
                  <form action="#" method="POST" enctype="multipart/form-data" >
               
                  <table class="table table-borderless border border-1  table-light">
                       <thead>
                         <tr>
                           <th></th>

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
                           <th>
                              <?= $user['user_id']; ?>
                           </th>
                           
                           <td>
                              <input type="file" name="image" id="image" value="#">
                           </td>
                         </tr>
                          <tr>
                           <th colspan="">First Name</th>
                           <td>
                              <input type="text" id="name" name="first_name" value="<?= $user['first_name']; ?>"><br>
                              <span id="name_msg" style="red"><?=  $first_name_msg ??"";  ?></span>
                           </td>
                         </tr>
                          <tr>
                           <th >Last Name</th>
                           <td>
                              <input type="text" id="name" name="last_name" value="<?= $user['last_name']; ?>"><br>
                               <span id="name_msg" style="red"><?=  $last_name_msg ??"";  ?></span>
                           </td>
                         </tr>
                          <tr>
                           <th>Email</th>
                           <td>
                              <input type="text" id="email" name="email" value="<?= $user['email']; ?>"><br>
                              <span id="name_msg" style="red"><?=  $email_msg ??"";  ?></span>
                           </td>
                         </tr>
                          <tr>
                           <th>Password</th>
                           <td>
                              <input type="text" id="password" name="password" value="<?= $user['password']; ?>"><br>
                              <span id="name_msg" style="red"><?=  $password_msg ??"";  ?></span>
                           </td>
                         </tr>
                          <tr>
                           <th >Gender</th>
                           <td >
                               <select class="form-select" id="gender" name="gender">
                                <option selected>Choose...</option>
                                <option value="male" >Male</option>
                                <option value="female">Female</option><br>
                                <span id="gender_msg"><?= $gender_msg ??""; ?></span>
                              </select>
                           </td>
                         </tr>
                          <tr>
                           <th>Date of Birth</th>
                           <td>
                              <input type="date" id="date_of_birth" name="date_of_birth" value="<?= $user['date_of_birth']; ?>"><br>
                              <span id="gender_msg"><?= $date_of_birth_msg ??""; ?></span>

                           </td>
                         </tr>
                          <tr>
                           <th>Home Town</th>
                           <td>
                              <input type="text" id="address" name="address" value="<?= $user['address']; ?>"><br>
                               <span id="gender_msg"><?= $home_town_message ??""; ?></span>

                           </td>
                         </tr>
                         <tr>
                            <td colspan="2">
                               <input type="submit" value="Update" name="update" class="btn btn-primary form-control-plaintext" ><a href="admin_profile_process.php?user_id=<?= $row['user_id']?>">Update</a></button>
                            </td>
                         </tr>
                       </tbody>
                  </table>
                 </form><br>
               </div>
               <div class="col-lg-2"></div>
            </div>
         </div>
      </div>
    </div>
<?php require_once("footer.php") ?>