
<?php
require_once("admin_header.php");
require_once("../require/connection.php");

if (isset($_REQUEST['post_id'])) {
    $post_id = $_GET['post_id'];

  
?>

<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="text-center text-uppercase mt-3">Update Post</h1>
                    <div class="border border-2 p-3">
                        <form action="require/update_post_process.php" method="POST" enctype="multipart/form-data">
                             <div class="mb-3">
                                <label for="blog_title" class="form-label">Add blog</label>
                                <select class="form-select" id="blog_title" name="blog_id">
                                    <option selected>Choose...</option>

                                    <?php 

                                    $query = "SELECT * FROM blog  ";
                                    $blog_result = mysqli_query($connection, $query);
                                    if ($blog_result) {
                                       
                                    while ($blog_row = mysqli_fetch_assoc($blog_result)) { ?>
                                    <option value="<?= $blog_row['blog_id'] ?>"><?= $blog_row['blog_title'] ?></option>
                                    <?php } 
                                        }
                                    ?>
                                </select>
                            </div>
                             <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category_id" required>
                                    <option selected>Choose...</option>
                                    <?php
                                    $query = "SELECT * FROM category";
                                    $result = mysqli_query($connection, $query);
                                    if ($result->num_rows) { 
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?= $row['category_id'] ?>"><?= $row['category_title'] ?></option>
                                    <?php } 
                                    } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                 <?php   $query = "SELECT * FROM post WHERE post_id = '$post_id' ";
                                $result = mysqli_query($connection, $query);
                                if ($result) {
                                $row = mysqli_fetch_assoc($result); ?>
                                <label for="post_title" class="form-label">Title </label>
                                <input type="text" class="form-control" id="post_title" name="post_title" value="<?= $row['post_title']; ?>">
                            </div>

                            <input type="hidden" name="post_id" id="post_id" value="<?= $row['post_id']; ?>">
                          
                            <div class="mb-3">
                               
                                <label for="post_summary" class="form-label">Summary</label>
                                <textarea name="post_summary" id="post_summary" cols="15" rows="2" class="form-control"><?= $row['post_summary']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="15" rows="4" class="form-control"><?= htmlspecialchars($row['post_description']); ?></textarea>
                            </div>
                            <div>
                                 <div class="mb-3">
                                <label for="image" class="form-label">Feature Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                                <label for="exampleSelect1" class="form-label mt-4">Total Attachment</label>
                                <select class="form-select" id="exampleSelect1" name="total_attachment">
                                    <option>Select Attachment</option>
                                    <?php
                                    for ($i = 1; $i <= 8; $i++) {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                    ?>
                                </select>
                                <span class="body">
                                    <div style="width:20%;display:inline-block" id="total_attachment_response"></div>
                                </span>
                            </div>

                            <div class="mb-3" align="center">
                                <input type="submit" value="Update POST" name="update_post" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}}
require_once("footer.php");
?>

