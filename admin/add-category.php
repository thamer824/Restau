<?php include ('partials/menu.php');  ?>
 

    <div class="main-content">
       <div class="wrapper">
       <h1> Categories    </h1>

       <br><br>
        <?php 
          if(isset($_SESSION['add']))
          {
               echo $_SESSION['add'];
               unset ($_SESSION['add']);

          }
          if(isset($_SESSION['upload']))
          {
               echo $_SESSION['upload'];
               unset ($_SESSION['upload']);

          }

        
        
        
        ?>
        <br><br><br>

       <!-- starts    -->
          <form action="" method="POST" enctype="multipart/form-data"><!-- multipart property t5alina naplodiw l images    -->
          
             <table class="tbl-30">

               <tr>
                  <td>Category's Name:</td>
                  <td>
                     <input type="text" name="title" placeholder="Category Title">
                  </td>
                  
               
               </tr>
               <tr>
                  <td> Select Image:</td>
                  <td>
                  <input type="file" name="image">
                  </td>
                
               </tr>

              





               <tr>
               <td>NEEDS:</td>
                  <td>
                     <input type="radio" name="featured" value="Yes"> Yes
                     <input type="radio" name="featured" value="No"> No <!-- l yes will be saved on database    -->
                     
                  </td>

               
               
               
               </tr>


               <tr>
               <td>active:</td>
                  <td>
                     <input type="radio" name="active" value="Yes"> Yes
                     <input type="radio" name="active" value="No"> No <!-- l name=active hoa li mawjoud f database ok ?     -->
                     
                  </td>
               
               
               
               
               </tr>
               <tr>
                   <td colspan="2">
                     <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                   
                   
                   </td>
               
               
               </tr>
             
             
             
             
             </table>
          
          
          
          
          </form>




       <!-- ends   -->


       <?php
         // lets check kil ada l btn submite clicked or not 
         if (isset($_POST['submit']))
         {

              // echo "clicked";       hedhi just bch tthabet teklika walee 

              //taawa 1.  lets get the value from the form li amalnehaa fazet l yes and no wl title
              $title=$_POST['title'];

              //behi w for the radio input type we need to check  whether the btn is clicked or not wela selected or not ( l fazet hedhom namlouhom juste bch nahiw l error)

                if(isset($_POST['featured']))
                {
                    //get the value ken tselecta dimaa nafes l khedma 
                    $featured =$_POST['featured'];
                }else{

                    //set the default value 
                    $featured="No" ;   // l value hoa (no )
                }
                if(isset($_POST['active']))
                {
                    //get the value ken tselecta dimaa nafes l khedma 
                    $active =$_POST['active'];
                }else{

                    //set the default value 
                    $active="No" ;   // l value hoa (no )
                }

                 //************image */
                        //check whther the img is selected or not


                //........ print_r($_FILES['image']);      
                 // lets brake the code khater manhebouuch value mtee l img yemchiw l database
                 //..........die() ;

                 //check whther our file is selected or not
                 if (isset($_FILES['image']['name'])) // l image hoa l name mte3 our file type 
                 {
                       // to upload img (we need img name,and source path,and destination path)


                       $img_name=$_FILES['image']['name'];

                       if($img_name !=""){
                       //auto rename our image 

                       // get the extention of our image (jpg,png,gif,ect)e.g  .....l expload fucntion taksem l image ala 2   mithel productfood.png
                       $ext=end(explode('.',$img_name));//te5edh ken l jpg wela png enti w chsametha
                       //rename the img
                       $img_name="product_category_".rand(000,999).'.'.$ext;//e.g product_category_834.jpg twali heka esem l img.


                      


                       $source_path=$_FILES['image']['tmp_name'];
                       $destination_path="../images/category/".$img_name;

                       //finalyy upload the imag
                       $upload=move_uploaded_file($source_path,$destination_path);
                       //check whether the img is iploaded or not
                       //and if the ig is not uploaded then stop the process and redirect error msg
                       if($upload==false){
                           $_SESSION['upload']="<div class='error'> Failed to upload image.</div>";
                           //redirect to add category page
                           header('location:'.SITEURL.'admin/add-category.php');

                           //stop the process now because if we fail to upload the img we dont want to the value to be inserted into database
                           die();

                       }
                     }
                


                 }else{
                     $img_name=""; // 5aliih feragh 

                 }




                      
                 //************image */




                  //2. lets create sql query to insert category into, database
                  $sql="INSERT INTO category SET
                     title='$title',
                     img_name='$img_name',
                     featured='$featured',
                     active='$featured'
                  
                   ";
                   //. tawa execute the qury and save it into dsatabase
                   $res=mysqli_query($conn, $sql);


                //4. check whther the query is executed or not and data is added or not 
                if($res==true)
                {

                         //query executed and category added

                         $_SESSION['add']="<div class='success'> category added succesfuly </div>";
                         //redirect it to manage category page 
                         header('location:'.SITEURL.'admin/manage-category.php');
                }else 
                {
                         $_SESSION['add']="<div class='error'> error (failed to get category) </div>";
                         //redirect it to manage category page 
                          header('location:'.SITEURL.'admin/add-category.php');



                }


         }
       
       
       
       
       
       
       ?>


       
       
       
       </div>
    
    
    
    
    
    </div>
















<?php include('partials/footer.php') ?>