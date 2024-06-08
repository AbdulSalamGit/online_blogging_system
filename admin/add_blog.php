<?php require_once("admin_header.php"); ?>

<div class="wrapper">
   <?php require_once("sidebar.php"); ?>
   <div class="main bg-light">
      <div class="container-fluid mt-5">
         <div class="row">
            <div class="col-lg-4"> </div>
            <div class="col-sm-12 col-lg-6">
               <h2>Create Blog</h2>
               <form action="require/blog_process.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                     <label for="blog_title">Blog Title</label>
                     <textarea class="form-control" id="blog_title" name="blog_title" required></textarea>
                  </div>
                  <br>
                  <div class="form">
                     <label for="">Blog Per Page</label>
                     <input type="number" name="post_per_page" id="post_per_page" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="image">Background Image</label>
                     <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary" name="add_blog">Create Blog</button>
               </form>
            </div>
            <div class="col-lg-2"> </div>
         </div>
      </div>
   </div>
</div>

<?php require_once("footer.php"); ?>
