<?php require_once("admin_header.php"); 

    require_once("../require/connection.php"); 
    $query = "SELECT * FROM user_feedback";
    $result = mysqli_query($connection, $query);

?>

<style>
    
</style>
<div class="wrapper">
       <?php require_once("sidebar.php"); ?>
       <div class="main bg-light">
        <div class="container feedback">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                  <div class="table-responsive">
                      <h1 class="text-center text-uppercase"> Feed Back</h1>
                           <table  id="table_id" class="display" style="width:100%">
                               <thead>
                                <tr>
                                   <th>No</th>
                                   <th>User ID</th>
                                   <th>User Name</th>
                                   <th>Email</th>
                                   <th>text</th>
                                   <th>Added_on</th>
                                   <th width="190px">Action</th>
                                
                                </tr>               
                                </thead>
                                <tbody>
                                    <?php 
                                     if ($result->num_rows) {
                                        while($row = mysqli_fetch_assoc($result)){


                                 ?>
                                    <tr>
                                        <td><?= $row["feedback_id"] ?></td>
                                        <td><?= $row["user_id"] ?></td>
                                        <td><?= $row["user_name"] ?></td>
                                        <td><?= $row["user_email"] ?></td>
                                        <td><?= $row["feedback"] ?></td>
                                        <td><?= $row["created_at"]?></td>
                                         <td>
                                        <button type="button" class="btn btn-outline-success">Approve</button>
                                        <button type="button" class="btn btn-outline-danger">Reject</button>
                                        </td>
                                        
                                    </tr>
                                     <?php 

                                    }
                                }

                                 ?>
                                             
                                </tbody>
                                <tfoot>
                                     <!-- <tr>
                                        <td>02</td>
                                        <td>System Architect</td>
                                        <td>abc@gmail.com</td>
                                        <td>Education</td>
                                        <td>Education</td>
                                        <td>$320,800</td>
                                        <td>$320,800</td>
                                    </tr> -->
                                </tfoot>
                                </table>         
                    </div>
                </div>
            </div>
        </div>


       </div>
</div>
<?php require_once("footer.php"); ?>