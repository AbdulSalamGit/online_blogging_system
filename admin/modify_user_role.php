<?php 
require_once("admin_header.php");
require_once("../require/connection.php"); 

$query = "SELECT * FROM user WHERE  user_id <> 1 ORDER BY role_id ASC";
$result = mysqli_query($connection, $query);
?>
<style>
    a{
        color: ;
        
    }
</style>
<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">
        <div class="container view_users">
            <div class="row">
                
                <div class="col-lg-12 col-sm-12 ">
                    <div class="table-responsive">
                        
                        <h3 class="text-center text-uppercase">User Management Setting</h3>
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
                                    <td><?= $row["role_id"] == 2 ? 'User' : 'Admin' ?></td>
                                    <td>
                                        <?php if ($row['role_id']==2){
                                        ?>
                                        <a href="require/admin_role_set_process.php?user_id=<?= $row["user_id"]?>" class="btn btn-outline-success text-body">Admin</a>
                                        <?php } else{
                                        ?>
                                         <a href="require/user_role_set_process.php?user_id=<?= $row["user_id"]?>" class="btn btn-outline-info text-body">User</a>
                                        <?php
                                        }?>         
                                             
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
