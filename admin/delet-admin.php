



<?php
//include constants.php here 
include('../config/constants.php');



//.get the id to delete
$id = $_GET['id'];



//create sql query to  delete
$sql =" DELETE FROM admine WHERE id=$id";
//exute the query 
$res=mysqli_query($conn ,$sql);
//check if the query is executed

if ($res==true)
{
//executed and admin deleted
//nasn3ou session bch l message youslelna fl manage-admine page 
$_SESSION['delete']=" <div class='success' > admin deleted succesfully.<div/>";
//tawa nredirectiwha lel admin page b http
header('location:'.SITEURL.'admin/manage-admin.php');

}
else {
//executed and admin not deleted
$_SESSION['delete']=" <div class='error' >      admin is not  deleted try again later. <div/>  ";
//tawa nredirectiwha lel admin page b http
header('location:'.SITEURL.'admin/manage-admin.php');



}







?>