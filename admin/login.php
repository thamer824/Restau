<?php  include('../config/constants.php');  ?>

<html>
    <head>
        <title>  login page </title>
        <link rel="stylesheet" href="../css/admin.css">
    
    
    </head>
    <body>
        <div class="login">
             <h1 class="text-center"> tameeer</h1>
             <?php 
             if (isset($_SESSION['login']))
             {
                 echo $_SESSION ['login'];//display session 
                 unset($_SESSION['login']);//remove session msg
             }
             if (isset($_SESSION['no-login-message']))
             {
                 echo $_SESSION ['no-login-message'];//display session 
                 unset($_SESSION['no-login-message']);//remove session msg
             }
             
             ?>


             <!--  login foorm lenaa taw namlouuu     -->
             <br><br>
                <form action="" method="POST" class="text-center">
                Username: <br>
            
                <input type="text" name="username" placeholder="Enter ur username"><br><br>
                Password:<br>
                <input type="password" name="password" placeholder="Enter ur password"><br><br>


                <!--  l value hoa esem l btn   -->
                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>
                
                
                </form>





             <!--  login foorm ends here      -->
        
        
        </div>
        
    </body>





</html>


<?php 
//check whether the submit btn is clicked or not
if (isset($_POST['submit']))
{
    //process for login 
     //1. get the data of the suer from login form 
       $username=$_POST['username'];
       $password=$_POST['password'];
     // ya tmr dima amel echoo bch etthabet li l fonction te5dem wale 

     // 2. sql query to check whther the username and the password match or not with the data availble (exist or not)
     $sql="SELECT * FROM admine WHERE username='$username' AND password='$password'";

     //3. execute the query and 
     $res=mysqli_query($conn,$sql);
     //lena lezemek include l constants 5ater l $conn mayarfheech w fl paget lo5riin lkool mawjouda 

    


     //4.tawa count the rows bch tlawej esque mawjoud l user wale
     $count=mysqli_num_rows($res);
     //ken l count=1 donc it means the user exist wken l count=0 donc mehouch exist

     if($count==1)
     {
         //user avail and login success
         $_SESSION['login']="<div class='success'>login successful.</div>";
         $_SESSION['user']=$username;//to check whether the user is loged in or not and logout will unset it 
         //redirect to Home page (dashboard)
         header('location:'.SITEURL.'admin/');
         //mat7ot chay par default bch temchi wahadha lel index.php wen talka l home page 

     }
      else {

           //user not avail  and login failed
           $_SESSION['login']="<div class='success'>u cant login check your data pls.</div>";
           //redirect to Home page (dashboard)
           header('location:'.SITEURL.'admin/login.php');
 
      }


}


?>