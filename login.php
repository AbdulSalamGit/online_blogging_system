<style>
 
   input[type="email"]
  {
    background-color: #2c3e50;
  }
</style>
<div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="myform bg-primary">
                          <h1 class="text-center">Login Form</h1>
                          <form action="login_process.php" method="POST">
                              <div class="mb-3 mt-4">
                                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">Password</label>
                                  <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                              </div>
                              <input type="submit" value="Submit" name="login" class="btn btn-secondary mt-3">
                              <!-- <button type="submit" class="btn btn-secondary mt-3">LOGIN</button> -->
                              <p class="text-dark">Not a member? <a href="#">Signup now</a></p>
                          </form>
                      </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- ______________End Model button trigger_________ -->
