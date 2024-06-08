<?php require_once("admin_header.php"); ?>
    <style>
      textarea{
        resize: none;
      }

    </style>
    <div class="wrapper">
       <?php require_once("sidebar.php"); ?>
       <div class="main bg-light">
            <div class="container">
                  <div class="row justify-content-center">
                    <div align="center">
                        <?php if (isset($_GET['message'])) {
                            $message = $_GET['message'];

                            echo "<h5 style='color:green'>".$message."</h5>";
                        } ?>
                        </div>
                    <div class="col-lg-6">
                      <h1 class="text-center text-uppercase mt-3">Add Category</h1>
                      <div class="border border-2 p-3">
                        <form action="require/add_category_process.php" method="POST">
                          <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                              <textarea  cols="15" rows="2" name="title" id="title" class="form-control"></textarea>
                            </div>

                          <div class="mb-3">
                            <label for="description" class="form-label">Category Description</label>
                            <textarea cols="15" rows="4" name="description" id="description" class="form-control"></textarea>
                          </div>
                        <div class="mb-3" align="center">
                           <input type="submit" name="add_category" value="Add Blog" class="btn btn-primary">

                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>      
              </div>
    </div>

<?php require_once("footer.php") ?>