<script>
function delete_user(user_id) {
    var confirm_ = confirm("Do you want to delete?");

    if (confirm_) {
        var ajax_request = new XMLHttpRequest();

        ajax_request.onreadystatechange = function () {
            if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = JSON.parse(ajax_request.responseText);
                if (response.success) {
                  
                    var row = document.getElementById('user_row_' + user_id);
                    row.parentNode.removeChild(row);
                }
                document.getElementById("add_responce").innerHTML = response.message;
            }
        };

        ajax_request.open("POST", "require/ajax_process.php", true);
        ajax_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax_request.send("flag=delete_user&user_id=" + user_id);
    }
}
</script>

<?php 
require_once("admin_header.php");
require_once("../require/connection.php"); 

$query = "SELECT * FROM user WHERE role_id IS NULL OR role_id = 2 AND role_id <> 1 ORDER BY user_id DESC";
$result = mysqli_query($connection, $query);
?>

<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">
        <div class="container view_users">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="table-responsive">
                        
                        <h3 class="text-center text-uppercase">View All Users Details</h3>
                        <div align="center">
                            <?php 
                            if (isset($_GET['message'])) {
                                $message = $_GET['message'];
                                echo '<h5 style="color:green; background-color:#079992; color:#fff; width:70%; border-radius: 20px; height:40px; padding-top:7px;">' . $message . '</h5>';
                            }
                            ?>
                            
                        </div>
                        <div id="add_responce" align="center"></div>
                        <table id="table_id" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Pic</th>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Home Town</th>
                                    <th>Status</th>
                                    <th>Status</th>
                                    <th>Is Active</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($result->num_rows) {
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr id="user_row_<?= $row['user_id'] ?>">
                                    <td class="sidebar-item"><img src="../upload_images/<?= $row['user_image']?>" alt="User Image"></td>
                                    <td><?= $row["user_id"]?></td>
                                    <td><?= $row["first_name"]." ".$row["last_name"]?></td>
                                    <td><?= $row["email"]?></td>
                                    <td><?= $row["gender"]?></td>
                                    <td><?= $row["address"]?></td>
                                    <td><?= $row["is_approved"]  ?></td>
                                    <td><?= $row["is_active"]?></td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?= $row["is_active"] == 'Active' ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td> 
                                        <button type="button" class="btn btn-info">
                                            <a href="update_user.php?user_id=<?= $row['user_id']?>" >update</a>
                                        </button> 
                                        <button type="button" class="btn btn-danger" onclick="delete_user('<?= $row['user_id'] ?>')">
                                            delete
                                        </button>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("footer.php") ?>
