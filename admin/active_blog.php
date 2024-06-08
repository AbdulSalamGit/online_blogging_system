<?php require_once("admin_header.php");

require_once("../require/connection.php");
$query = "SELECT * FROM blog ORDER BY blog_id DESC";
$result = mysqli_query($connection, $query);

if ($result->num_rows) {
?>
<style>
   a {
        text-decoration: none;
        color: #fff;
    }
</style>
<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">
        <div class="container">
            <div class="row">
               <div class="col-lg-1"></div>
                <div class="col-lg-10 col-sm-12">
                    <h3 class="text-center">Active And Inactive Blog</h3>
                  
                    <div align="center">
                        <?php if (isset($_GET['message'])) {
                            $message = $_GET['message'];
                            echo "<h5 style='color:green'>".$message."</h5>";
                        } ?>
                    </div>
                    <div id="add_responce" align="center"></div>
                    <div class="table-responsive">
                        <table id="table_id" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Categories</th>
                                    <th>Blog Status</th>
                                    <th>Added On</th>
                                    <th>Updated On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr id="blog_row_<?= $row['blog_id'] ?>">
                                    <td><?=$row['blog_id'] ?></td>
                                    <td><?=$row['blog_title'] ?></td>
                                    <td class="blog_status"><?=$row['blog_status'] ?></td>
                                    <td><?=$row['created_at'] ?></td>
                                    <td><?=$row['updated_at'] ?></td>
                                    <td>
                                        <?php if ($row['blog_status']=='InActive'){ ?>
                                            
                                      
                                        <button type="button" class="btn btn-info" onclick="toggleUserStatus('<?= $row['blog_id'] ?>', 'Active')">
                                            Active
                                        </button>
                                    <?php }else{ ?>
                                        <button type="button" class="btn btn-danger" onclick="toggleUserStatus('<?= $row['blog_id'] ?>', 'InActive')">
                                            InActive
                                        </button>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("footer.php") ?>

<script>
function toggleUserStatus(blog_id, status) {
    var confirm_ = confirm("Do you want to " + status + " this Blog?");
    if (confirm_) {
        var ajax_request = new XMLHttpRequest();
        ajax_request.onreadystatechange = function () {
            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = JSON.parse(ajax_request.responseText);
                if (response.success) {
                    var row = document.getElementById('blog_row_' + blog_id);
                    row.querySelector('.blog_status').innerText = status;
                    document.getElementById("add_responce").innerHTML = response.message;
                } else {
                    alert(response.message);
                }
            }
        };
        ajax_request.open("POST", "require/ajax_process.php", true);
        ajax_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax_request.send("flag=toggle_user_status&blog_id=" + blog_id + "&status=" + status);
    }
}
</script>
