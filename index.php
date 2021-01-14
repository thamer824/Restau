<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;  ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Welcome</h2>

            <?php   
              //create sql query to display categories from database
              $sql=" SELECT * FROM category LIMIT 4";
              //now execute the query
              $res=mysqli_query($conn,$sql);
              // we need to count the rows to check whether the data is avail or not 
              $count = mysqli_num_rows($res);
              if ($count>0){
                  //category is avail and we need a while looop o display all the categories from database 
                  while($row=mysqli_fetch_assoc($res))
                  {
                      //get values like title and img_name and id
                      $id=$row['id'];
                      $title=$row['title'];
                      $img_name=$row['img_name'];
                      ?>
                    <a href="<?php echo SITEURL;?>category-foods.php">
                           <div class="box-3 float-container">
                               <?php
                               //check whther the img is availble or not  
                                  if ($img_name=="")
                                  {
                                      echo "<div class='error'>image not availble</div>";
                                  }else
                                  
                                  {
                                      //img is availble
                                      ?>
                                         <img src="<?php echo SITEURL; ?>images/category/<?php echo $img_name; ?>" alt="category" class="img-responsive img-curve">
                                      <?php
                                  }
                               
                               
                               ?>
                               

                                <h3 class="float-text text-white"><?php echo $title; ?> </h3>
                           </div>
                    </a>
                        





                      <?php






                  }





              }else{
                  //its not avail
                  echo " <div class='error'> cat not added</div>";
              }
            
            
            
            ?>
            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- category MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Availble Jobs</h2>

             <?php 
               //geting food from databse that are active and featured donc lkoool manetha
               $sql2="SELECT * FROM products WHERE active='Yes' AND featured='Yes'  LIMIT 8";
               //execute the query
               $res2=mysqli_query($conn,$sql2);
               //count the rows:
               $count2=mysqli_num_rows($res2);
               //check whther jobs are avail or not
               if ($count2>0){
               //availble so lets get them from database:
                       while($row=mysqli_fetch_assoc($res2)){
                               //get all the values
                               $id=$row['id'];
                               $title=$row['title'];
                               $price=$row['price'];
                               $description=$row['description'];
                               $img_name=$row['img_name'];
                               ?>
  <div class="food-menu-box">
                <div class="food-menu-img">
                    <!--check whther the img is availble or not -->
                    <?php  
                         if($img_name==""){
                             //not availble

                             echo "<div class='error'> img not availble.</div>";
                         }else
                         {
                               //its availble
                               ?>
                      <img src="<?php echo SITEURL;  ?>images/category/<?php echo $img_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                             <?php


                         }
                    
                    
                    
                    
                    ?>
                    
                </div>

                <div class="food-menu-desc">
                    <h4><?php  echo $title;   ?></h4>
                    <p class="food-price">$<?php  echo $price;   ?></p>
                    <p class="food-detail">
                    <?php  echo $description;   ?>
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">APPLY Now</a>
                </div>
            </div>



                              <?php
                               
                   

                       }


               }else
               
               {
                   echo" <div class='error'>not avail.</div>   ";
               } 



            ?>


            

            


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Jobs</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include('partials-front/footer.php'); ?>