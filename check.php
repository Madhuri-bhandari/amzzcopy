<?php
session_start();
include_once('db.php');
if(isset($_POST['email']) && isset($_POST['password']))
{

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "select * from user where email='$email' and password='$password'";
  $result=mysqli_query($conn,$query);
  $row=mysqli_fetch_array($result);
  
   if($result->num_rows==1)
   {
    echo "Success";
   }
   else
   {
    echo "Error";
   
   }
}

?>