<?php include ('partials/menu.php');  ?>

<div class="main-content">
    <div class="wrapper">
       <h1>update admin page</h1>
        
           <br /><br />

           <?php 
              //1. get the id of the selected admin
              $id=$_GET['id'];


              //2. then create sql query to get datails of the admin li 5deneh
               $sql="SELECT * FROM admine WHERE id=$id";

               //3. execute the query now
               $res=mysqli_query($conn, $sql);

               //.4 tawa netchekiw ken l query executed or not 
                if ($res==true)
                {
                    //check whether the data mawjouda walee 
                    $count=mysqli_num_rows($res);
                    //check whether we have admin data or not 
                    if($count==1)
                    {
                        //get the details
                       // echo "admin availble";
                       $rows=mysqli_fetch_assoc($res);
                       $full_name= $rows['full_name'];
                       $username = $rows['username'];
                    }
                    else{
                        //redirect to manage admin page
                        header('location:',SITEURL.'admin/manage-admin.php');
                    }
                }


           ?>




        <form action="" method="POST">
        
            <table class="tbl-30">
               <tr>
                  <td>full name :</td>
                  <td>
                      <input type="text" name="full_name" value="<?php echo $full_name; ?>" >

                  </td>
              </tr>
               
               <tr>

                   <td>username:</td>

                    <td>
                    <input type="text" name="username" value=" <?php echo $username;  ?> " >
                    </td>

               </tr> 

               <tr>
               
                   <td colspan="2">
                      <input type="hidden" name="id" value="<?php echo $id;  ?>" >
                      <input type="submit" name="submit" value="update Admin" class="btn-secondary">
                   </td>
               
               </tr>


                
               
               
            
            
            
            
            </table>
        
        
        
        </form>





    </div>
</div>






<?php  

//check whether the submit button is clicked or not 
if( isset($_POST['submit']))
{
    //echo "button submited";
    //get all the value from the form to update
    //manetha bch tbadel l username wl name mel id li 5detha manetha ki te5edh mithel id=1 fiih username=tamer w full_name tamer tbadelhom b tamira w tamira w baaz l id bch tokod nafesha 
     $id=$_POST['id'];
     $full_name=$_POST['full_name'];
     $username=$_POST['username'];

     //create the sql query to update the admin   ... l full_name li bl ahmer teb3a l database
     $sql="UPDATE admine SET 
     full_name='$full_name',   
     username='$username' 
     WHERE id='$id'
     

     
     
     
     ";

     // tawa executi l query 
     $res =mysqli_query($conn, $sql);
      //check whether the query is exuctued succefuly or not 
      if ($res==true)
      {
          //query is exucuted and admin is updated
          $_SESSION['update']="<div class='success'> admin updated succesfuly .</div>";
          // redirect to manage admin page 
          header('location:'.SITEURL.'admin/manage-admin.php');
      }
      else {
          //failed to, update admin
          $_SESSION['update']="<div class='error'> failed to update admin .</div>";
          // redirect to manage admin page 
          header('location:'.SITEURL.'admin/manage-admin.php');

      }


}








 ?>













<?php include('partials/footer.php') ?>  