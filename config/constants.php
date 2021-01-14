<?php

//add a session or start it 
session_start();


define('SITEURL','http://localhost/database/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','test');

$conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());//database conection
   $db_select =mysqli_select_db($conn,DB_NAME) or die (mysqli_error());//selecting our db name
?>