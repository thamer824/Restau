
<?php include ('partials/menu.php');  ?>


       <div class="main-content">
          <div class="wrapper">
            <h1>manage admin</h1>

            <br /> <br /> <br /> 
            <?php   
            if (isset($_SESSION['add']))
            {
                echo $_SESSION ['add'];//display session 
                unset($_SESSION['add']);//remove session msg
            }
            if (isset($_SESSION['delete']))
            {
                echo $_SESSION ['delete'];//display session 
                unset($_SESSION['delete']);//remove session msg
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION ['update'];//display session (ykolk li howa c bon updated w mbaed yetna7a beloutaneya )
                unset($_SESSION['update']);//remove session msg
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION ['user-not-found'];//display session (ykolk c bon  )
                unset($_SESSION['user-not-found']);//
            }
            if(isset($_SESSION['password-not-match']))
            {
                echo $_SESSION ['password-not-match'];//display session (ykolk c bon  )
                unset($_SESSION['password-not-match']);//
            }
            if(isset($_SESSION['change-pwd']))
            {
                echo $_SESSION ['change-pwd'];//display session (ykolk c bon  )
                unset($_SESSION['change-pwd']);//
            }




             ?>
             <br/> <br/><br/>



            <a href="add.php" class="btn-primary"> add admin</a>
            <br /><br /> <br /> 

            <table class="tbl-full">
              <tr>
                 <th>S.N</th>
                 <th>FULL NUMBER</th>
                 <th>Username</th>
                 <th>Actions</th>
              </tr>

             <?php  
                 $sql="SELECT * FROM admine";// to  get all admin and then wwe are going to execute the query 
                 $res=mysqli_query($conn,$sql);
                 //chech whether the query is executed or not 

                 if ($res==TRUE){

                        //count rows ken ana data f database wale
                        $count=mysqli_num_rows($res);// hedhi fnct bch ne5dhou l rows lkol m db 
                        $sn=1 ;
                        if ($count>0)
                        {
                           //donc ana data f db
                           while($rows=mysqli_fetch_assoc($res)){
                               //amlna while loop bch ne5dhou rows li f database lkoool w bch tokod te5dem medem ana rows 
                               $id=$rows['id'];
                               $full_name=$rows['full_name'];
                               $username=$rows['username'];

                               //display values in our table 
                             ?>
                                
                                    <tr>
                                      <td><?php echo $sn++; ?></td>
                                      <td> <?php echo $full_name; ?></td>
                                      <td><?php echo $username; ?></td>
                                      <td>
                                          <a href="<?php  echo SITEURL ; ?>admin/update-password.php?id=<?php echo $id ;?>" class="btn-primary"> change password</a>
                                          <a href="<?php  echo SITEURL ; ?>admin/update-admin.php?id=<?php echo $id ;?>" class="btn-secondary"> update admin</a>
                                          <a href="<?php echo SITEURL ; ?>admin/delet-admin.php?id=<?php echo $id ;?>" class="btn-danger"> delete admin</a>
                                       </td>
               
              
              </tr>



                             <?php




                           }
                        }else 
                        {
                            //lena amaanech
                        }

                 }
             
             
             
             ?>







             


            </table>

            


          </div>
       </div>





       <?php include('partials/footer.php') ?>  