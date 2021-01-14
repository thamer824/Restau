<?php include('partials/menu.php') ?>

<div class="main-content">
  <div class="wrapper">
     <h1> category</h1>
     <br /> <br /> <br /> 




     <?php 
          if(isset($_SESSION['add']))
          {
               echo $_SESSION['add'];
               unset ($_SESSION['add']);

          }
          if(isset($_SESSION['remove']))
          {
               echo $_SESSION['remove'];
               unset ($_SESSION['remove']);

          }
          if(isset($_SESSION['delete']))
          {
               echo $_SESSION['delete'];
               unset ($_SESSION['delete']);

          }
          if(isset($_SESSION['no-category-found']))
          {
               echo $_SESSION['no-category-found'];
               unset ($_SESSION['no-category-found']);

          }
          if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        
        
        
        ?>
        <br><br>
            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary"> add category</a>
            <br /><br /> <br /> 

            <table class="tbl-full">
              <tr>
                 <th>S.N</th>
                 <th>title</th>
                 <th>image</th>
                 <th>featured</th>
                 <th>active</th>
                 <th>Actions</th>
              </tr>
                 <?php
                 //query to get all the category from database 
                    $sql=" SELECT * FROM category ";
                    //execute it now
                    $res=mysqli_query($conn,$sql);
                    //count the rows
                    $count=mysqli_num_rows($res);//$res heya $result


//create the serial nbre
                          $sn=1;

                    //check whther we have data in database or not 
                    if($count>0)
                    {
                      //we have data in databse donc lezem get it and then display it 

                       while($row=mysqli_fetch_assoc($res)){
                           $id=$row['id'];// l id li bela7mer heya l id li mawjouda f database
                           $title=$row['title'];
                           $img_name=$row['img_name'];
                           $featured=$row['featured'];
                           $active=$row['active'];
                           ?>
                                     <tr>
                                     <td><?php echo $sn++;  ?></td>
                                      <td><?php echo $title;  ?></td>
                                      <td>
                                      
                                      <?php 
                                         //check whether the img is avail or not 
                                         if ($img_name!=""){
                                            //display the img
                                            ?>
                                            <img src="<?php echo SITEURL;  ?>images/category/<?php echo $img_name;     ?>     " width="350px"    >


                                            <?php
                                         }
                                      
                                      
                                      
                                      
                                      
                                      ?>
                                      
                                      
                                      
                                      
                                      </td>
                                      <td><?php echo $featured;  ?></td>
                                      <td><?php echo $active;  ?></td>
                                         <td>
                                           <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary"> update category</a>
                                           <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&img_name=<?php echo $img_name;?>" class="btn-danger"> delete category</a>
                                         </td>
              
              
                                      </tr>






                           <?php



                       }



                    }else 
                    {
                       // we dont have data in datbase    
                       //display msg inside table  donc lezemna html donc break l php w mbaed awed helou w binethom ekteb l html mta3eeek !!!!!!!!!!!
                       ?>

                       <tr>
                         <td colspan="6"><div class="error">No category added.</div></td>
                       
                       </tr>

                       <?php
                    }
                 
                 
                 
                 
                 ?>

              

              


            </table>




  </div>


</div>




<?php include('partials/footer.php') ?>