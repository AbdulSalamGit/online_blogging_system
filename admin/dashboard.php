<?php 
    // session_start();
    require_once("admin_header.php");
    require_once("../require/connection.php");
    $user = $_SESSION['user'];
    $user_id = $user['user_id'];


    $query = "SELECT COUNT(*) AS total_users FROM user WHERE  role_id = 2 AND role_id <> 1";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $total_users = $row['total_users'];

    $feedback_query = "SELECT COUNT(*) AS total_feedback FROM user_feedback";
    $result = mysqli_query($connection, $feedback_query);
    $row = mysqli_fetch_assoc($result);
    $total_feedback = $row['total_feedback'];


    $pending_query = "SELECT COUNT(*) AS pending_users FROM user WHERE is_approved= 'Pending' AND role_id = 2 AND role_id <> 1 ";
    $result = mysqli_query($connection, $pending_query);
    $row = mysqli_fetch_assoc($result);
    $pending_users = $row['pending_users'];


    $approve_query = "SELECT COUNT(*) AS approve_users FROM user WHERE is_approved= 'Approved' AND role_id = 2 AND role_id <> 1 ";
    $result = mysqli_query($connection, $approve_query);
    $row = mysqli_fetch_assoc($result);
    $approve_users = $row['approve_users']; 


    $rejected_query = "SELECT COUNT(*) AS rejected_users FROM user WHERE is_approved= 'Rejected' AND role_id = 2 AND role_id <> 1 ";
    $result = mysqli_query($connection, $rejected_query);
    $row = mysqli_fetch_assoc($result);
    $rejected_users = $row['rejected_users'];

    $blog_query = "SELECT COUNT(*) AS total_blog FROM blog WHERE user_id = '$user_id' ";
    $result = mysqli_query($connection, $blog_query);
    $row = mysqli_fetch_assoc($result);
    $total_blog = $row['total_blog'];

    $post_query = "SELECT COUNT(*) AS total_post FROM post  ";
    $result = mysqli_query($connection, $post_query);
    $row = mysqli_fetch_assoc($result);
    $total_post = $row['total_post'];



 ?>
    
   <style>
       .dashboard .card{
        width: 270px;
        height: 170px;
        padding-left: ;

       }
       .dashboard h2{
        font-size: 22px;
        font-weight: bold;
        padding-top: 20px;

       }
       .dashboard h3{
        font-size: 20px;
       }
       .dashboard a{
        text-decoration: none;
       }
       .dashboard .svg{
        margin: auto;
       }
   </style>
    <div class="wrapper">
       <?php require_once("sidebar.php"); ?>
        <div class="main p-3 bg-light">
            <div class="container-fluid dashboard">
              <h1 class="text-center text-uppercase"> Admin Dashboard </h1>

              <div class="row ">
                  <div class="col-sm-8 col-lg-3 ">
                      <div class="card">
                           <div class="svg">
                            <?php require_once("svg/user.php"); ?>
                           </div>
                          <h2 class="text-center ">Total Users  <?=  $total_users; ?></h2>
                          <h3 class="text-center "> <a href="view_users.php">View</a></h3>   
                      </div>
                  </div>
                 
                  <div class="col-sm-8 col-lg-3 col-md-3">
                       <div class="card">
                         <div class="svg">
                            <?php require_once("svg/new_user.php"); ?>
                        </div>
                          <h2 class="text-center ">Pendding Users <?= $pending_users; ?></h2>
                          <h3 class="text-center "> <a href="view_pending_user.php">View</a></h3>
                          
                      </div>
                  </div>

                  <div class="col-sm-8 col-lg-3 col-md-3 ">
                       <div class="card">
                        <div class="svg">
                            <?php require_once("svg/approve_user.php"); ?>
                        </div>
                          <h2 class="text-center ">Approved Users <?= $approve_users; ?></h2>
                          <h3 class="text-center "> <a href="view_approve_user.php">View</a></h3>          
                      </div>
                  </div>

                  <div class="col-sm-8 col-lg-3 col-md-3 ">
                       <div class="card">
                        <div class="svg">
                            <?php require_once("svg/rejected_user.php"); ?>
                        </div>
                          <h2 class="text-center ">Rejected Users <?= $rejected_users;?></h2>
            
                          <h3 class="text-center "> <a href="view_rejected_user.php">View</a></h3>          
                      </div>
                  </div>
                 
              </div>

              <div class="row ">
                  
                   <div class="col-sm-8 col-lg-3 col-md-3 mt-5"> 
                       <div class="card">
                         <div class="svg">
                            <?php require_once("svg/blog.php"); ?>
                        </div>
                          <h2 class="text-center ">Total Blogs <?= $total_blog;?></h2>
                          <h3 class="text-center "> <a href="view_blogs.php">View</a></h3>    
                      </div>
                  </div>

                   <div class="col-sm-8 col-lg-3 col-md-3 mt-5">
                       <div class="card">
                        <div class="svg">
                            <?php require_once("svg/dashboard_post.php"); ?>
                        </div>
                          <h2 class="text-center ">All Post <?= $total_post;?></h2>
                          <h3 class="text-center "> <a href="view_all_post.php">View</a></h3>
                       </div>
                  </div>

                  <div class="col-sm-8 col-lg-3 col-md-3 mt-5">
                      <div class="card">
                         <div class="svg">
                            <?php require_once("svg/feedback.php"); ?>
                        </div>
                          <h2 class="text-center ">Feedback <?=  $total_feedback; ?></h2>
                          <h3 class="text-center "> <a href="feedback.php">View</a></h3>
                          
                      </div>
                  </div>

                  <div class="col-sm-8 col-lg-3 col-md-3 mt-5">
                       <div class="card">
                        <div class="svg">
                            <?php require_once("svg/comments.php"); ?>
                        </div>
                          <h2 class="text-center ">Comments</h2>
                          <h3 class="text-center "> <a href="comments.php">View</a></h3>          
                      </div>
                  </div>
               
                  
              </div>      
            </div>
        </div>
    </div>

    <?php  require_once("footer.php"); ?>