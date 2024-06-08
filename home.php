<style>
  .center h5{
/*    background-color: #16a085;*/
    color: #fff;
    height: 46px;
    padding-top: 10px;
    border-radius: 20px;
    width: 70%;
  }
</style>
<div align="center">
     <?php 
     if (isset($_GET['message'])) {
         $message = $_GET['message'];
         echo '<h5 style="color:green; background-color:#079992; color:#fff; width:70%; border-radius: 20px; height:40px; padding-top:7px;">' . $message . '</h5>';
     }
     ?>
                            
                        </div>
<div class="container" id="home">
    <div class="container-fluid pt-6 ">
      
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">

            <div class="carousel-item active">
              <img src="images/blog_2.jpg" class="d-block w-100 h-70" alt="..."  >
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>

            </div>
            <div class="carousel-item">
              <img src="images/blog_3.jpg" class="d-block w-100 h-70" alt="..." >
              <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
              <img src="images/blog_4.jpg" class="d-block w-100 h-70" alt="..." >
              <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
           
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
  </div><br>
