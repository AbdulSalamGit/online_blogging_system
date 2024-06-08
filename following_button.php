         <?php 
         
          if (isset($_SESSION['user'])) {
          $user = $_SESSION['user'];
          $user_id = $user['user_id'];
         $query = "SELECT * FROM following_blog WHERE follower_id = '$user_id' ";
         $result = mysqli_query($connection,$query);
         if ($result) {
                                               

           $row = mysqli_fetch_assoc($result);
           if ($row['status']=="Followed") {
                                               
             ?>
              <button type="button" class="btn btn-primary ">UnFollow</button>
             <?php
             }else{
                                                ?>
             <button type="button" class="btn btn-primary "><a href="require/follow_process.php?blog_id=<?= $row['blog_id'] ?>">Follow</a></button>
              <?php
             }
         }
          }?>