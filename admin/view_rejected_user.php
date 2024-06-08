<?php require_once("admin_header.php"); ?>
<?php   require_once("admin_header.php"); 
        require_once("../require/connection.php"); 

    $query = "SELECT * FROM user WHERE is_approved = 'Rejected' ";
    $result = mysqli_query($connection, $query);


?>

<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">

        <div class="container view_users">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <h3 class="text-center">View Rejected User</h3>
                    <div class="table-responsive">
                        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Pic</th>
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Home Town</th>
                                    <th>Status</th>
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
                                    <td><?= $row["is_approved"]?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger  btn-sm">
                                          <a href="#">Delete</a>
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