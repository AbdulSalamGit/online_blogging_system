<?php 
    // session_start();


require_once("admin_header.php");
     
     $user = $_SESSION['user'];
     $user_id = $user['user_id'];

    require_once("../require/connection.php");
    $query = "SELECT * FROM blog WHERE user_id = '$user_id' ORDER BY blog_id DESC";
    $result = mysqli_query($connection, $query);

    if ($result->num_rows) {
    
 ?>
<style>
   a{
        text-decoration: none;
        color: #fff;
      }
</style>
<div class="wrapper">
    <?php require_once("sidebar.php"); ?>
    <div class="main bg-light">

        <div class="container">
            <div class="row">
               
                <div class="col-lg-12 col-sm-12">
                    <h3 class="text-center">View Blogs</h3>
                   <div  >
                       <button class="btn btn-primary "><a href="add_blog.php">Create Blog</a></button><br>
                   </div>   <br>
                     <div align="center">
                            <?php 
                            if (isset($_GET['message'])) {
                                $message = $_GET['message'];
                                echo '<h5 style="color:green; background-color:#079992; color:#fff; width:70%; border-radius: 20px; height:40px; padding-top:7px;">' . $message . '</h5>';
                            }
                            ?>
                            
                        </div>
                    <div class="table-responsive">
                        <table id="table_id" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Blog Title</th>
                                    <th>Blog Status</th>
                                    <th>add_on</th>
                                    <th>update_on</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($row=mysqli_fetch_assoc($result)){

                                 ?>
                                <tr>
                                    <td><?=$row['blog_id'] ?></td>
                                    <td><?=$row['blog_title'] ?></td>
                                    <td><?=$row['blog_status'] ?></td>
                                    <td><?=$row['created_at'] ?></td>
                                    <td><?=$row['updated_at'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info">
                                            <a href="update_blog.php?blog_id=<?=$row['blog_id'] ?>" > Update </a>

                                        </button>
                                        <button type="button" class="btn btn-danger">
                                            <a href="require/delete_blog_process.php?blog_id=<?=$row['blog_id'] ?>">Delete</a>
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