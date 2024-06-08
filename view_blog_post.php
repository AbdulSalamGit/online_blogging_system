<?php 
require_once("header.php");
require_once("require/connection.php");

 
  if(!isset($_SESSION['user'])) {
        $message = "You have to login first";
         header("Location:index.php?message=$message");
          exit();
      }else{
                
     
                     

                    

if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];

    // Fetch the posts
    $query = "SELECT * FROM post WHERE blog_id='$blog_id'";
    $result = mysqli_query($connection, $query);
}
?>

<div class="container-fluid">
    <div class="row">
        <?php 
        $query = "SELECT * FROM blog WHERE blog_id='$blog_id'";
        $result2 = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result2);
        ?>
        <h3 class="text-center">Blog Title: <?= $row['blog_title'] ?></h3>

        <div class="row">
            <div class="col-lg-12">

                <style>

                    .see_more a {
                        text-decoration: none;
                        color: black;
                        font-size: 15px;
                    }
                    .see_more a:hover {
                        background-color: skyblue;
                    }
                    .card {
                        margin: 1rem 0;
                        width: 100%;
                    }
                    .card img {
                        max-width: 100%;
                        height: auto;
                    }
                    .pagination {
                        display: flex;
                        justify-content: center;
                        margin-top: 1rem;
                    }
                    .pagination a {
                        margin: 0 5px;
                        padding: 10px 15px;
                        text-decoration: none;
                        border: 1px solid #ddd;
                        color: black;
                        cursor: pointer;
                    }
                    .pagination a:hover {
                        background-color: #ddd;
                    }
                    p{
                      font-size: 18px;
                    }
                </style>

                <div class="container mt-4">
                    <div class="row border border-2">

                        <div class="col-sm-12 col-lg-9 border border-1">
                            <h1 class="text-uppercase text-center mt-3">POST</h3>
                              
                            <hr>
                            <div class="row">
                                <?php 
                                if ($result->num_rows) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="col-12">
                                    <div class="card">
                                      <div class="card-body">
                                        <h3 class="card-title text-center"> <?= $row['post_title'] ?></h5>
                                        <h5 class="card-text text-center"><?= $row['post_summary'] ?></h5>
                                        <img src="upload_images/<?= $row['featured_image'] ?>" class="card-img-top" alt="">
                                        <p><?= $row['post_description'] ?></p>
                                          <?php if ($row['is_comment_allowed']==1): ?>
                                            <form action="">
                                            <label for="comment">Comment</label>
                                            <input type="text" name="comment" id="comment" class="form-control-plaintext border border-2"><br>
                                          
                                          <input type="submit" value="Send" name="submit" class="btn btn-primary">
                                          </form>
                                          <?php endif ?>

                                           
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-3">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <h3 class="text-uppercase text-center mt-3">Categories</h3>
                                    <hr>
                                    <ul class="list-group" style="list-style-type: square; padding-left: 30px;">
                                    <?php  
                                    $query = "SELECT * FROM category";
                                    $result = mysqli_query($connection, $query);
                                    if ($result->num_rows) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <li class="list-group-item"><a href="#health"><?php echo $row['category_title'] ?></a></li>
                                    <?php 
                                        }
                                    }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php  } require_once("footer.php"); ?>
