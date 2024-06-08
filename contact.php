<style>
  .feedback input[type="text"],input[type="email"]
  {
    background-color: #c8d6e5;
  }
  textarea{
    background-color: red;
  }
</style>
<div class="container border border-2  mt-4  " id='contact' >
    <div class="row">
      <div class="col-sm-12">
        <h1 class="text-uppercase text-center mt-3">contact us</h1>
        <hr>
      </div>
      <div class="row ">
        <div class="col-lg-4">
         
        </div>
        
        <div class="col-sm-12 col-lg-6 border border-2 feedback">
               
            <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required class="form-control-plaintext ">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required class="form-control-plaintext">

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required class="form-control-plaintext">

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required class="form-control-plaintext" style="background-color:#c8d6e5;"></textarea><br>

            <input type="submit" value="Submit" name="submit" class="form-control bg-primary"><br>
        </form>
        </div>
      </div>
    </div>
  </div><br>

	