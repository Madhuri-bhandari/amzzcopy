<?php

if(isset($_POST['email']) && isset($_POST['password']))
{

  $email = $_POST['email'];
  $password = $_POST['password'];
  if($email=="demo123@gmail.com"&& $password=="12345")
   {
    echo 1;
   }
   else
   {
    echo 0;
   
   }
}

?>