<?php

include_once('db.php');


if(isset($_POST['email']) && isset($_POST['password']))
{

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "select email,password from user where email='$email' and password='$password'";
  echo $query;
  $result=mysqli_query($conn,$query);
  echo $result->num_rows;
   if($result->num_rows==1)
   {
    echo 1;
   }
   else
   {
    echo 0;
   
   }
}

?>