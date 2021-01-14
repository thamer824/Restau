<?php include ('partials/menu.php');  ?>


<div class="main-content">
   <div class="wrapper">
       <h1>update ur password here</h1>
       <br><br>

         <?php    
           if (isset($_GET['id']))
           {
               $id=$_GET['id'];
           }
         
         ?> 


         <form action="" method="POST">
         
             <table class="tbl-30">
                <tr>
                   <td>Current Password:</td>
                   <td>
                      <input type="password" name="current_password" placeholder="old Password">
                   </td>
                
                
                
                </tr>

                <tr>
                   <td>  New Password:</td>
                   <td>
                     <input type="password" name="new_password" placeholder="new password here pls ">
                   </td>
                
                
                </tr>

                <tr>
                
                   <td>Confirm Password:</td>
                   <td>
                     <input type="password" name="confirm_password" placeholder="confirm your password">
                   
                   </td>
                
                
                </tr>


                <tr>
                   <td colspan="2">
                     <input type="hidden" name="id" value="<?php echo $id;  ?>">
                     <input type="submit" name="submit" value="Change Password " class="btn-secondary">
                   
                   </td>
                
                
                
                </tr>
             
             
             
             
             
             </table>
         
         
         
         
         
         </form> 
   
   </div>


</div>


<?php 

//check if the submit btn is clicked or not 
      if (isset($_POST['submit']))

      {
          //echo"clicked";
          //1. now lets get the data from Form
            $id=$_POST['id'];
            $current_password=$_POST['current_password'];
            $new_password=md5($_POST['new_password']);
            $confirm_password=md5($_POST['confirm_password']);



          //2. lets check whther the user with the current id exist or not 
             $sql="SELECT * FROM admine WHERE id=$id AND password='$current_password'";
             //lena l id loula mahatinech kot 5aterha integer dont matest7a9ech mpuch kima l password ynajem ykoun string wela varchar

          //2.1  execute the query
          $res=mysqli_query($conn,$sql);

          if ($res==true){

            $count=mysqli_num_rows($res);//check whether the data is avail or not
            if($count==1){
                //user exist and password can be changed 
                //echo "user found";
                //check whther the new paass and confirm match or not
                if($new_password==$confirm_password)
                {
                    //donc updatiiih 
                    
                    //echo"pass matched";  hedi bch et thabet ml fonction te5dem walee dont lezmek tabeth msg tchoufou wsol wale
                    //lena badalna sql2 5aterna f nafes l bloc w manajmouuch namlou vrble ekher b mnafes l query
                     $sql2=" UPDATE admine SET
                     password='$new_password'
                     WHERE id=$id
                     
                     
                      ";
                      // execute the query
                      $res2=mysqli_query($conn,$sql2);
                      //check whetehr the query id executed or not 
                      if ($res2==true){
                          //display success msg
                          $_SESSION['change-pwd']="<div  class='success'> password changed succesfuly.</div>";
                          //redirect the user now
                          header('location:'.SITEURL.'admin/manage-admin.php');
                      }
                      else 
                      {
                          //display error msg
                          $_SESSION['change-pwd']="<div  class='error'> password does not chnaged.</div>";
                          //redirect the user now
                          header('location:'.SITEURL.'admin/manage-admin.php');
                      }


                }
                else{
                   // mekenech redirect kil adaa 
                   $_SESSION['password-not-match']="<div  class='error'> password not match.</div>";
                   //redirect the user now
                   header('location:'.SITEURL.'admin/manage-admin.php');
                }


            }else {
                //user does not ecxist and redirect
                $_SESSION['user-not-found']="<div  class='error'> user not found.</div>";
                //redirect the user now
                header('location:'.SITEURL.'admin/manage-admin.php');
            }


          }

          //3.check whetehr the new password and confirm password are the same or not 
          //4.change password if all above is true hahah 

      }


?>











<?php include('partials/footer.php') ?>  