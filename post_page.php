<?php 
require_once("require/connection.php");
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
    cursor: pointer;
  }
  .pagination a:hover {
    background-color: #ddd;
  }
</style>

<?php  
$query = "SELECT * FROM category";
$result = mysqli_query($connection, $query);
if ($result) {
  while ($category = mysqli_fetch_assoc($result)) {
?>

<div class="container mt-4" id="education">
  <div class="row border border-2">
    <div class="col-sm-12 col-lg-9 border border-1">
      
      <h3 class="text-uppercase text-center mt-4"><?php echo $category['category_title']; ?></h3>
      <hr>

      <div class="row">
        <?php  
        $postQuery = "SELECT post.* 
                      FROM post 
                      JOIN post_category ON post.post_id = post_category.post_id 
                      WHERE post_category.category_id = '".$category['category_id']."' 
                      AND post.post_status = 'Active'";
        $postResult = mysqli_query($connection, $postQuery);
        if ($postResult) {
          if (mysqli_num_rows($postResult)) {
            while ($post = mysqli_fetch_assoc($postResult)) {
        ?>
        <div class="col-sm-6">
          <div class="card m-4">
            <h5><?php echo $post['post_title']; ?></h5>
            <a href="view_single_post.php?post_id=<?= $post['post_id']?>"><img src="upload_images/<?php echo $post['featured_image']; ?>" alt=""></a>
            <p><?php echo $post['post_summary']; ?><a href="#"> see more</a></p>
            <button type="button" class="btn btn-primary m-2">Follow</button>
          </div>
        </div>
        <?php 
            }
          } else {
            echo "<p>No posts available in this category.</p>";
          }
        } else {
          echo "<p>Error fetching posts: " . mysqli_error($connection) . "</p>";
        }
        ?>
      </div>
    </div>

    <div class="col-sm-12 col-lg-3">
      <h3 class="text-uppercase text-center mt-4">Recent Posts</h3>
      <hr>
      <?php 
      $recent_posts_Query = "SELECT * FROM post ORDER BY post_id DESC LIMIT 4";
      $recent_posts_result = mysqli_query($connection, $recent_posts_Query);
      if ($recent_posts_result) {
        while ($recent_post = mysqli_fetch_assoc($recent_posts_result)) {
      ?>
      <div class="card mt-2">
        <span>Title: <?= $recent_post['post_title'] ?></span>
        <a href="view_single_post.php?post_id=<?= $recent_post['post_id']?>"><img src="upload_images/<?= $recent_post['featured_image'] ?>" alt=""></a>
        <p><?= substr($recent_post['post_summary'], 0, 100) ?>...</p>
      </div>
      <?php 
        }
      } else {
        echo "<p>No recent posts available.</p>";
      }
      ?>
    </div>
  </div>
</div>

<?php 
  }
} else {
  echo "<p>Error fetching categories: " . mysqli_error($connection) . "</p>";
}
?>
