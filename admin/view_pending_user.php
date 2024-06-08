<?php require_once("admin_header.php");

    require_once("../require/connection.php"); 

    $query = "SELECT * FROM user WHERE is_approved='Pending' AND role_id = 2 AND role_id <> 1 ORDER BY user_id DESC";
    $result = mysqli_query($connection, $query);


 ?>
<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <h3 class="text-center">View Pendding User</h3>
                   <div align="center">
                            <?php 
                            if (isset($_GET['message'])) {
                                $message = $_GET['message'];
                                echo '<h5 style="color:#fff; background-color:#079992; color:#fff; width:70%; border-radius: 20px; height:40px; padding-top:7px;">' . $message . '</h5>';
                            }
                            ?>
                            
                        </div>
                    <div class="table-responsive">
                        
                        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Pic</th>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Home Town</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 if ($result->num_rows) {
                                    while($row = mysqli_fetch_assoc($result)){


                                 ?>
                                <tr>
                                    <td class="sidebar-item"><img src="../upload_images/<?= $row['user_image']?>" alt="User Image"></td>
                                    <td><?= $row["user_id"]?></td>
                                    <td><?= $row["first_name"]?></td>
                                    <td><?= $row["last_name"]?></td>
                                    <td><?= $row["gender"]?></td>
                                    <td><?= $row["email"]?></td>
                                    <td><?= $row["password"]?></td>
                                    <td><?= $row["address"]?></td>
                                    <td>
                                       <button type="button" class="btn btn-outline-success">   <a href="approve_process.php?user_id=<?= $row["user_id"] ?>&email=<?= $row["email"]?>">Approve</a>
                                       </button>
                                        <button type="button" class="btn btn-outline-danger"><a href="reject_process.php?user_id=<?= $row["user_id"] ?>&email=<?= $row["email"]?>" style="color: black;">Reject</a>
                                        </button>
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