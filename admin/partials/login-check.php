<?php 
// hatineha lena khater l menu mawjouuud fl paget lkool presque donc nhotoha lena ashel w mbaed n7otoha fl menu
//************ */
//authorization and access control




// tawa lets check the user is logged in or not 
if (!isset($_SESSION['user']))  // if user session is not set 
{
   //user  is not logged in 
   //redirect to login page with msg 

   $_SESSION['no-login-message']="<div class='error text-center'> pls login to access admin panel .</div>";
   //redirect to login page 
   header('location:'.SITEURL.'admin/login.php');
}



?>