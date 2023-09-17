<?php
include_once('../conn.php');
if(isset($_REQUEST['pwdrst']))
{
  $email = $_REQUEST['email'];
  $pwd = md5($_REQUEST['pwd']);
  $cpwd = md5($_REQUEST['cpwd']);
  if($pwd == $cpwd)
  {
    $reset_pwd = mysqli_query($conn,"update account set password='$pwd' where email='$email'");
    if($reset_pwd>0)
    {
        header("Location: loginn.php?ok=Successfully Update your account you can now login.");
    }
    else
    {
        header("Location: passwordreset.php?error=Update Account Error");
    }
  }
  else
  {
    header("Location: passwordreset.php?error=The Passwords is not match");
  }
}

if($_GET['secret'])
{
  $email = base64_decode($_GET['secret']);
  $check_details = mysqli_query($conn,"select email from account where email='$email'");
  $res = mysqli_num_rows($check_details);
  if($res>0)
    { ?>
<html>  
<head>  
    <title>Password Reset</title>  
  
     <title>Baby's Cake</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 
    <link rel="stylesheet" href="css/style3.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

     <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  </head>
<style>
#validate_form .form-group label{
    font-size:30px;
}
#validate_form .form-group input{
    font-size:20px;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

h3{
    font-size:60px;
}

  @media only screen and (max-width: 720px) {
#validate_form .form-group input{
   width:100%;
}
 h3{
     font-size:40px;
 }
  #password-message{
     color:red;
     font-size:20px;
 }
  }
 #password-message{
     color:red;
     font-size:20px;
 }
 </style>

<body>
<?php include 'header2.php'; ?>
<div class="container">  
    <div class="table-responsive">  
    <h3 align="center">Reset Password</h3><br/>
    <div class="box">
    <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>


<?php } ?>
<?php if (isset($_GET['ok'])) { ?>

<p class="ok"><?php echo $_GET['ok']; ?></p>


<?php } ?>
     <form id="validate_form" method="post" >  
    
      <input type="hidden" name="email" value="<?php echo $email; ?>"/>
      <div class="form-group">
       <label for="pwd" id="one">Password</label>
       <input type="password" name="pwd" id="pwd" placeholder="Enter Password" required 
       data-parsley-type="pwd" data-parsley-trigg
       er="keyup" class="form-control" onblur="checkPassword()"/>
       <p id="password-message"></p>
      </div>
      <div class="form-group">
       <label for="cpwd"> Password</label>
       <input type="password" name="cpwd" id="cpwd" placeholder="Enter Confirm Password" required data-parsley-type="cpwd" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>
      <div class="form-group">
       <input type="submit" id="login" name="pwdrst" value="Reset Password" class="submit" />
       </div>
         

     </form>
     </div>
   </div>  
  </div>
<?php } } ?>
<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
    function checkPassword() {
  var password = document.getElementById("cpwd").value;
  var passwordMessage = document.getElementById("password-message");
  var submitButton = document.getElementById("submit");
  
  if (password.length < 8) {
    passwordMessage.innerHTML = "Password must be at least 8 characters long";
    submitButton.disabled = true;
  } else if (!password.match(/[a-z]/g)) {
    passwordMessage.innerHTML = "Password must contain at least one lowercase letter";
    submitButton.disabled = true;
  } else if (!password.match(/[A-Z]/g)) {
    passwordMessage.innerHTML = "Password must contain at least one uppercase letter";
     submitButton.disabled = true;
  } else if (!password.match(/[0-9]/g)) {
    passwordMessage.innerHTML = "Password must contain at least one number";
     submitButton.disabled = true;
  } else if (!password.match(/[\W_]/g)) {
    passwordMessage.innerHTML = "Password must contain at least one special character";
     submitButton.disabled = true;
  } else {
    passwordMessage.innerHTML = "";
     submitButton.disabled = false;
  }
}

</script>

</body>
</html>