<?php require_once("header.php"); ?>
<style>
  .feedback input[type="text"],input[type="email"]
  {
    background-color: #2c3e50;
    color: #fff;
  }
  
  .feedback h1{
    padding-left: 60px;
  }
  .feedback h3{
    font-size: 22px;
    padding: 12px 0;
  }
</style>
	<div class="container-fluid feedback">
	<div class="container border border-2  mt-4  " id='contact' >
    <div class="row">
      <div class="col-sm-12">
        <h1 class="text-uppercase text-center mt-3">contact us</h1>
        <hr>
      </div>
      <div class="row ">
        <div class="col-lg-4">
         
        </div>
          
        <div class="col-sm-12 col-lg-6 border border-2 ">
               <h3 class="text-center">
                    <?php if (isset($_GET['message'])) {
                      echo $message = $_GET['message'];
                } ?>
                </h3><br>
            <form action="feedback_process.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required class="form-control-plaintext ">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required class="form-control-plaintext">


            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required class="form-control-plaintext" style="background-color:#2c3e50; color: #fff;"></textarea><br>

            <input type="submit" value="Submit" name="submit" class="form-control bg-primary"><br>
        </form>
        </div>
      </div>
    </div>
  </div><br>
	</div><br>

<?php require_once("footer.php"); ?>
