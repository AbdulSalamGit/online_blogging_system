<?php 
require_once("require/connection.php");



$cards_per_page = 3;


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $cards_per_page;


$total_query = "SELECT COUNT(*) FROM blog ";
$total_result = mysqli_query($connection, $total_query);
$total_row = mysqli_fetch_array($total_result);
$total_blogs = $total_row[0];


$total_pages = ceil($total_blogs / $cards_per_page);


$query = "SELECT * FROM blog LIMIT $start_from, $cards_per_page";
$result = mysqli_query($connection, $query);
?>

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
    margin: 1rem;
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
  }
  .pagination a:hover {
    background-color: #ddd;
  }
</style>

<div class="container mt-4">
  <div class="row border border-2">
    <div class="col-sm-12 col-lg-9 border border-1">
      <h3 class="text-uppercase text-center mt-3">Blogs</h3>
      <hr>
      <div class="row">
        <?php 
        if ($result->num_rows) {
          while ($row = mysqli_fetch_assoc($result)) {
            
        ?>
          <div class="col-sm-6 col-md-4 d-flex">
            <div class="card">
              <h5 class="card-title">Blog Title: <?= $row['blog_title'] ?></h5>
              <h5 class="card-text">Author: </h5>
              <a href="view_blog_post.php?blog_id=<?= $row['blog_id'] ?>">
                <img src="upload_images/<?= $row['blog_background_image'] ?>" class="card-img-top" alt=""></a>
              <div class="card-body">
                <button type="button" class="btn btn-primary form-control" > Follow</button>
              </div>
            </div>
          </div>
        <?php
        } 
          
        }
        ?>
      </div>
      <div class="pagination">
        <?php if($page > 1): ?>
          <a href="?page=<?= $page - 1 ?>">Previous</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $total_pages; $i++): ?>
          <a href="?page=<?= $i ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if($page < $total_pages): ?>
          <a href="?page=<?= $page + 1 ?>">Next</a>
        <?php endif; ?>
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
                while($row = mysqli_fetch_assoc($result)){
            ?>
                  <li class="list-group-item"><a href="#education"><?php echo $row['category_title'] ?></a></li>
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
