<?php
include('../config/constants.php');
//check whther the id and img_name is set or not 

if (isset($_GET['id']) AND isset($_GET['img_name']))
{

   //then get the value and delete
   //echo "get value and delete";
   $id=$_GET['id'];
   $img_name=$_GET['img_name'];

   //remove the physical img if its availble
     if($img_name !="")
     {
          //img is availble so remove it 
         $path="../images/category/".$img_name;
         //remove the img
         $remove = unlink($path);
         //if failed to remove img then add an error msg and stop the process
         if ($remove==false){
             //set the sessiokn img
             $_SESSION['remove']="<div class='error'>failed to remove img.</div>";
             //redirect to manag ecategory pagfe
             header('location:'.SITEURL.'admin/manage-category.php');
             //stop then process
             die();
         }
     }
   //delete data from database
   $sql="DELETE  FROM category WHERE id=$id ";
   //execute the query now
   $res=mysqli_query($conn,$sql);
   //check whether then data deleted from database or not 
   if($res==true){
       //set sucess msg and send msg
       $_SESSION['delete']="<div class='success'>deleted succesfuly.</div>";
       //redirect to manage category page
       header('location:'.SITEURL.'admin/manage-category.php');
   }else {
       //set fail msg and send msg
       $_SESSION['delete']="<div class='error'> not deleted .</div>";
       //redirect to manage category page
       header('location:'.SITEURL.'admin/manage-category.php');

   }

   //redirect to manage pahge

}else
{
    //redirect to category page 
    header('location:'.SITEURL.'admin/manage-category.php');
}





?>