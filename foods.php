<?php include('partials-front/menu.php'); ?>

    <!-- job sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- job sEARCH Section Ends Here -->



    <!-- job MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Jobs Menu</h2>

           <?php 
             //display jobs that they are active
             $sql="SELECT * FROM products " ;
             //exceute the query 
             $res=mysqli_query($conn,$sql);
             //count rows now
             $count=mysqli_num_rows($res);
             //check whther the food is availble or not 
             if($count>0){
                 //jobs are availble


                 //get from the query:
                      while($row=mysqli_fetch_assoc($res))
                      {
                       //get all the value then 
                          $id=$row['id'];
                          $title=$row['title'];
                          $description=$row['description'];
                          $price=$row['price'];
                          $img_name=$row['img_name'];
                           ?>
                 <div class="food-menu-box">
                   <div class="food-menu-img">


                  <!-- check whther the img is availble or not  -->
                  <?php    
                  
                         //chceck now
                         if ($img_name==""){
                              //img is not avail

                               echo "<div class='error'> img is not availble.</div>;        ";

                         }else{

                            ?>
                           
                                 <img src="<?php echo SITEURL; ?>images/category/<?php  echo $img_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            

                             

                           <?php




                         }
                  
                  
                  
                  
                  
                  ?>



                
                   
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price">$<?php echo $price;?></p>
                    <p class="food-detail">
                    <?php echo $description;?>
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                          
                          
                          <?php 



                     }




             }else{
                 echo"<div class='error'>not availble</div>";
             }


           ?>



            

           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- job Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>