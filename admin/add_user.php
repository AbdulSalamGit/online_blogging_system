<?php require_once("admin_header.php"); ?>

    <div class="wrapper">
       <?php require_once("sidebar.php"); ?>
       <div class="main bg-light">
        
            
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-6">
                      <h1 class="text-center text-uppercase mt-3">Register Form</h1>
                      <hr>
                      
                      <div class="border border-2 p-3">
                        <form action="">
                          <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                          </div>
                          
                          <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname">
                          </div>
                          
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                          </div>
                          
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                          </div>
                          
                          <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender">
                              <option selected>Choose...</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                          
                          <div class="mb-3">
                            <label for="date" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date" name="date">
                          </div>
                          
                          <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="image">
                          </div>
                          <div class="mb-3">
                            <label for="home_town" class="form-label">Home Town</label>
                            <input type="text" class="form-control" id="home_town" name="home_town">
                          </div>
                          
                          <button type="submit" class="btn btn-primary form-control bg-primary" name="submit">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
               
           

       </div>


    </div>

<?php require_once("footer.php") ?>