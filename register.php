<?php require_once("header.php");
      require_once("register_process.php");
       ?>
<script src="../js/form_validation.js"></script>

<style>

</style>

<div class="container register">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <h1 class="text-center text-uppercase">Register Form</h1>
      <hr>
      <h4 class="text-center">
         <?php 
         if (isset($_GET['message'])) {
          echo $message = $_GET['message'];
          
            } ?>
      </h4>
      <div class="border border-2 p-3">
        <form action="#"  method="POST" onsubmit="return form_validation()" enctype="multipart/form-data" >
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control-plaintext" id="name" name="name">
            <span id="name_msg"><?=  $first_name_msg ??"";  ?></span>
          </div>
          
          <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control-plaintext" id="lname" name="lname">
            <span id="lname_msg"><?=  $last_name_msg ??"";  ?></span>
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control-plaintext" id="email" name="email" style="background-color:#fff; color: black;">
            <span id="email_msg"><?=  $email_msg ??"";  ?></span>
          </div>
          
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control-plaintext" id="password" name="password">
            <span id="password_msg"><?= $password_msg ??""; ?></span>
          </div>
          
          <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender">
              <option selected>Choose...</option>
              <option value="male" >Male</option>
              <option value="female">Female</option>
              <span id="gender_msg"><?= $gender_msg ??""; ?></span>
            </select>
           
          </div>
          
          <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control-plaintext" id="dob" name="dob">
            <span id="dob_msg"><?= $date_of_birth_msg ??""; ?></span>
          </div>
          
          <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control-plaintext" id="image" name="image">
            <span id="image_msg"><?= $image_msg ??""; ?></span>
          </div>
          
          <div class="mb-3">
            <label for="home_town" class="form-label">Home Town</label>
            <input type="text" class="form-control-plaintext" id="home_town" name="home_town">
            <span id="home_town_message"><?= $home_town_message ??""; ?></span>
          </div>
          <input type="submit" value="Submit" name="register" class="btn btn-primary form-control" style="background-color:#222f3e ; color: #fff;">
          
        </form>
      </div>
       
    </div>

  </div>
</div>

<?php 
    // require_once("login.php");
    require_once("footer.php"); 
?>
