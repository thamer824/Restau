<?php include('partials/menu.php'); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>
        <?php  
        if (isset($_SESSION['add']))//if the sesion is set or not we are cheking here
            {
                echo $_SESSION ['add'];//display session 
                unset($_SESSION['add']);//remove session msg
            }
             ?>
        
        
        
        <?php

        
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php') ?>  
<?php
if (isset($_POST['submit']))
{   // 1. get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

// 2. sql query to saev the data into database
   $sql =" INSERT INTO admine SET 
       full_name='$full_name',
       username='$username',
       password='$password'
   
      ";

  //3. execute query and save data into dtabase
   $res =mysqli_query($conn,$sql) or die (mysqli_error());

   //4. check whether the data is inserted or not and display appropriate message
   if ($res==TRUE )
   {
       //data inserted 
       //echo('data inserted');
       $_SESSION['add']="admin added succesfuly";
        //redirect page to manage admin 
        header("location:".SITEURL.'admin/manage-admin.php');
   }
   else {
       //failed inserted
       //echo('data faiiiil inserted');
       $_SESSION['add']="admin failed to be added";
       //redirect page to add admin 
       header("location: ".SITEURL.'admin/add.php');
   }
 
}

 
?>