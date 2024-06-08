<?php require_once("header.php");

require_once("require/connection.php");


 if(!isset($_SESSION['user'])) {
        $message = "You have to login first";
         header("Location:index.php?message=$message");
          exit();
      }else{
              




if (isset($_REQUEST['post_id'])) {

	$post_id = $_GET['post_id'];

	$query = "SELECT * FROM post WHERE post_id = '$post_id' ";
	$result = mysqli_query($connection,$query);
	if ($result) {
		$row = mysqli_fetch_assoc($result);
	


 ?>
<div class="container">
	<div class="row border border-1">
		<h1 class="text-center text-uppercase"><?= $row['post_title']?></h1>
		<div class="col-lg-2"></div>
		<div class="col-lg-8 col-sm-12" align="center">
			<h3 class="text-center "><?= $row['post_summary']?></h3>
			<img src="upload_images/<?= $row['featured_image'] ?>" alt="" height="300px">
			<p><?= $row['post_description']?></p>
			 <?php if ($row['is_comment_allowed']==1): ?>
                <form action="require/comment_process.php" method="POST">
                  	<div class="comment">
                  <label for="comment">Comment</label>

                  <input type="text" name="comment" id="comment" class="form-control-plaintext border border-2">
                  <input type="hidden" name="post_id" value="<?= $row['post_id']?>">
                  <br>
                  <input type="submit" value="SEND" name="submit" class="btn btn-primary">

                </div>
                </form>
                <?php endif ?>
			
		</div>
	</div>
</div>

<?php 	
	}
	
}
}

require_once("footer.php"); ?>