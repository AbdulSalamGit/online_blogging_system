<?php require_once("admin_header.php");
require_once("../require/connection.php");
$query = "SELECT * FROM post ORDER BY post_id DESC";
$result = mysqli_query($connection, $query);

if ($result->num_rows) {
?>
<style>
   a {
        text-decoration: none;
        color: #fff;
   }
   img {
        width: 80px;
        height: 80px;
        border-radius: 15%;
   }
</style>
<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">
        <div class="container">
            <div class="row">
               <div id="add_responce" align="center"></div>
                <div class="col-lg-12 col-sm-12">
                    <h3 class="text-center">View All Post</h3>
                   <div>
                       <button class="btn btn-primary"><a href="add_post.php">Create POST</a></button><br>
                   </div><br>
                     <div align="center">
                            <?php 
                            if (isset($_GET['message'])) {
                                $message = $_GET['message'];
                                echo '<h5 style="color:green; background-color:#079992; color:#fff; width:70%; border-radius: 20px; height:40px; padding-top:7px;">' . $message . '</h5>';
                            }
                            ?>
                            
                        </div>
                    <div class="table-responsive">
                        <table id="table_id" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Summary</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Comment Allow</th>
                                    <th>add_on</th>
                                    <th>update_on</th>
                                    <th>Action</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr id="post_row_<?= $row['post_id'] ?>">
                                    <td>
                                        <img src="../upload_images/<?= $row['featured_image'] ?>" alt="Post Image">
                                    </td>
                                    <td><?= $row['post_id'] ?></td>
                                    <td><?= $row['post_title'] ?></td>
                                    <td><?= $row['post_summary'] ?></td>
                                    <td><?= $row['post_description'] ?></td>
                                    <td class="post_status"><?= $row['post_status'] ?></td>
                                    <td><?= $row['is_comment_allowed']? "Comment is Active " :"Comment Not allowed"?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td><?= $row['updated_at'] ?></td>
                                    <td>
                                        <?php if ($row['post_status']=='Active'){ ?>
                                        <button type="button" class="btn btn-danger" onclick="togglePostStatus('<?= $row['post_id'] ?>', 'Inactive')">Inactive</button>
                                        <?php }else { ?>
                                        <button type="button" class="btn btn-info" onclick="togglePostStatus('<?= $row['post_id'] ?>', 'Active')">Active</button>
                                    <?php } ?>
                                    </td>
                                    <td>
                                        <!-- <button class="btn btn-success">Update</button> -->
                                        <a href="update_post.php?post_id=<?= $row['post_id'] ?>" class="btn btn-success">Update</a>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("footer.php") ?>
<script>
function togglePostStatus(post_id, status) {
    var confirm_ = confirm("Do you want to " + status + " this Post?");
    if (confirm_) {
        var ajax_request = new XMLHttpRequest();
        ajax_request.onreadystatechange = function () {
            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = JSON.parse(ajax_request.responseText);
                if (response.success) {
                    var row = document.getElementById('post_row_' + post_id);
                    row.querySelector('.post_status').innerText = status;
                    document.getElementById("add_responce").innerHTML = response.message;
                } else {
                    alert(response.message);
                }
            }
        };
        ajax_request.open("POST", "require/ajax_process.php", true);
        ajax_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax_request.send("flag=toggle_post_status&post_id=" + post_id + "&status=" + status);
    }
}
</script>
