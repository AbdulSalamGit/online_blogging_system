<?php 
require_once("admin_header.php");
require_once("../require/connection.php");

if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];

    $query = "SELECT * FROM blog WHERE blog_id = '$blog_id'";
    $result = mysqli_query($connection, $query);

    if ($result->num_rows) {
        $row = mysqli_fetch_assoc($result);
?>

<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-sm-12 col-lg-6">
                    <h2>Update Blog</h2>
                    <form action="require/update_blog_process.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="blog_id" value="<?= $row['blog_id'] ?>">
                        <div class="form-group">
                            <label for="blog_title">Blog Title</label>
                            <textarea class="form-control" id="blog_title" name="blog_title" required><?= htmlspecialchars($row['blog_title']) ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image">Background Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            <input type="hidden" name="existing_image" value="<?= htmlspecialchars($row['blog_background_image']) ?>">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="update_blog">Update Blog</button>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
</div>
<?php 
    }
}

require_once("footer.php"); 
?>
