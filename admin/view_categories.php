<?php require_once("admin_header.php");

    require_once("../require/connection.php");
    $query = "SELECT * FROM category ORDER BY category_id DESC";
    $result = mysqli_query($connection, $query);

    if ($result->num_rows) {
    
 ?>
<style>
	h1{
		font-size: 40px;
		font-weight: bold;
		padding-top: 20px;
	}
	h3{
		font-size: 22px;
	}
    a:hover{
        color: #fff;
    }
</style>
<div class="wrapper">
       <?php require_once("sidebar.php"); ?>
       <div class="main bg-light">
       	<div class="container">
       		<div class="row">
                <!-- <div class="col-lg-1"></div> -->
                <div class="col-lg-12 col-sm-12">
       			      <h1 class="text-center text-uppercase"> View Category</h1>
                   <div align="center">
                            <?php 
                            if (isset($_GET['message'])) {
                                $message = $_GET['message'];
                                echo '<h5 style="color:green; background-color:#079992; color:#fff; width:70%; border-radius: 20px; height:40px; padding-top:7px;">' . $message . '</h5>';
                            }
                            ?>
                            
                        </div>
                  <div class="table-responsive">
                           <table  id="table_id" class="display" style="width:100%">
                               <thead>
                                 
                                <tr>
                                   <th>ID</th>
                                   <th>Title</th>
                                   <th>Description</th>
                                   <th>Status</th>
                                   <th>Added_on</th>
                                   <th>updated_on</th>
                                   <th>Action</th>
                                
                                </tr>               
                                </thead>
                                <tbody>
                                    <?php 
                                    while($row=mysqli_fetch_assoc($result)){

                                 ?>
                                    <tr>
                                        <td><?= $row['category_id'] ?></td>
                                        <td><?= $row['category_title'] ?></td>
                                        <td><?= $row['category_description'] ?></td>
                                        <td><?= $row['category_status'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                        <td><?= $row['updated_at'] ?></td>
                                         <td width="200px">
                                        
                                         <?php if ($row["category_status"] == 'Active') { ?>
                                            <button type="button" class="btn btn-outline-danger"><a href="require/category_acitve_process.php?Category_id=<?= $row['category_id'] ?>">InActive</a></button>
                                        <?php } else { ?>
                                           <button type="button" class="btn btn-outline-success"><a href="require/category_acitve_process.php?category_id=<?= $row['category_id'] ?>">Active</a>
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
<?php require_once("footer.php"); ?>