<?php 
require_once("../require/connection.php");

$query = "SELECT * FROM blog";
$result = mysqli_query($connection, $query);
if ($result->num_rows) { 
?>

<?php require_once("admin_header.php"); ?>
<script type="text/javascript">
    function total_attachment() {
        var no_of_attachment = document.getElementById('no_of_attachment').value;
        var ajax_request = null;

        if (window.XMLHttpRequest) {
            ajax_request = new XMLHttpRequest();
        } else {
            ajax_request = ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax_request.onreadystatechange = function() {
            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                document.getElementById("total_attachment_response").innerHTML = ajax_request.responseText;
            }
        }
        ajax_request.open("POST", "require/ajax_process.php");
        ajax_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax_request.send("flag=total_attachment&no_of_attachment=" + no_of_attachment);
    }
</script>

<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="text-center text-uppercase mt-3">Add Post</h1>
                    <div class="border border-2 p-3">
                         <div align="center">
                            <?php 
                            if (isset($_GET['message'])) {
                                $message = $_GET['message'];
                                echo '<h5 style="color:green; background-color:#079992; color:#fff; width:70%; border-radius: 20px; height:40px; padding-top:7px;">' . $message . '</h5>';
                            }
                            ?>
                            
                        </div>
                        <form action="require/add_post_process.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="blog_title" class="form-label">Add blog</label>
                                <select class="form-select" id="blog_title" name="blog_id">
                                    <option selected>Choose...</option>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?= $row['blog_id'] ?>"><?= $row['blog_title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
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
                                <label for="summary" class="form-label">Summary</label>
                                <textarea name="summary" id="summary" cols="15" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="15" rows="4" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Feature Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleSelect1" class="form-label mt-4">Total Attachment</label>
                                <div class="body">
                                    <select class="form-control show-tick" id="no_of_attachment" onchange="total_attachment()">
                                        <option value="0">Select Attachment</option>
                                        <?php for ($i = 1; $i <= 8; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <span class="body">
                                <div style="width:20%;display:inline-block" id="total_attachment_response"></div>
                            </span>
                            <div class="mb-3" align="center">
                                <input type="submit" value="ADD_POST" name="add_post" class="btn btn-primary form-control-plaintext">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("footer.php"); ?>

<?php } ?>
