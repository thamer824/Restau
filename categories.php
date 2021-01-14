<?php include('partials-front/menu.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Find ur Job</h2>
      

          <?php 
             //display all the categories that are active
             //sql query 
             $sql="SELECT * FROM category WHERE active='Yes'";
             //execute the query :
             $res=mysqli_query($conn,$sql);
             //count the rows
             $count=mysqli_num_rows($res);
             //check whether category availble or not :
             if($count>0) {
                 //catgory availble
                 while($row=mysqli_fetch_assoc($res)){
                     //lets get all the values by id
                     $id= $row['id'];
                     $title=$row['title'];
                     $img_name=$row['img_name'];
                     ?>

                       <a href="category-foods.html">
                             <div class="box-3 float-container">

                             <!--//we need first to check whther the img is avail or not -->
                             <?php   
                                if($img_name==""){
                                    //img is not avail or not 
                                    echo" <div class='erro'>img is not avail.</div>     ";

                                }else{

                                  ?>
                                   <img src="<?php  echo SITEURL; ?>images/category/<?php echo $img_name;  ?>" alt="Pizza" class="img-responsive img-curve">

                                 <?php


                                }



                               ?>
                              

                             <h3 class="float-text text-white"><?php echo $title;  ?></h3>
                             </div>
                       </a>

                  <?php
                 }
             }else{
                 //category are not availble 

                 echo "<div class='error'>category not found.</div>";
             }
          
          
          
          
          ?>
 

           

            

        

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>