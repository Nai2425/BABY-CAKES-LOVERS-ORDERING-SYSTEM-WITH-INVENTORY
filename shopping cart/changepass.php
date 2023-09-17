<?php
include_once('../conn.php');
include("auth_session.php");
if(isset($_REQUEST['pwdrst']))
{
  $email = $_REQUEST['email'];
  $check_email = mysqli_query($conn,"select email from account where email='$email'");
  $res = mysqli_num_rows($check_email);
  if($res > 0)
  {
    $message = '<div>
     <p><b>Hello!</b></p>
     <p>This is from Baby Cake, You are recieving this email because we recieved a change password request coming from your account.</p>
     <br>
     <p>Click the button Below to redirect to the page to change your password.</p>
      <br>
     <p><button class="btn btn-primary"><a href="https://babyscake.000webhostapp.com/shopping%20cart/changep.php?secret='.base64_encode($email).'">Reset Password</a></button></p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p>
    </div>';

include_once("../SMTP/smtp/class.phpmailer.php");
include_once("../SMTP/smtp/class.smtp.php");
$email = $email; 
$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "ccompanyname2@gmail.com";   //Enter your username/emailid
$mail->Password = "cymlcvgvfavuwono";   //Enter your password
$mail->FromName = "Company Name";
$mail->AddAddress($email);
$mail->Subject = "Reset Password";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
  header("Location:changepass.php?ok=Successfully Send");
}
}
else
{
    header("Location:changepass.php?error=The email that you have been input is incorrect");
}
}

?>
<html>  
<head>  
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
 <style>
#validate_form .form-group label{
    font-size:30px;
}
#validate_form .form-group input{
    font-size:20px;
}
h3{
    font-size:60px;
}
  @media only screen and (max-width: 720px) {
#validate_form .form-group input{
   width:100%;
}
 
  }
 </style>
 </head>


<body>
<?php include 'header.php'; ?>
<div class="container">  

    <div class="table-responsive">  
    <h3 style="text-align:center;">Change Password</h3><br/>
    <div class="box">
    <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>


<?php } ?>
<?php if (isset($_GET['ok'])) { ?>

<p class="ok"><?php echo $_GET['ok']; ?></p>


<?php } ?>
 <?php 
                                    $query = "SELECT email FROM account where username = '{$_SESSION['username']}'";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $product)
                                        {
                                            ?>
                                            
     <form id="validate_form" method="post" >  
    
       <div class="form-group">
       <label for="email">Email Address :</label>
       <input type="email" name="email" id="email" value="<?= $product['email']; ?>" required 
       data-parsley-type="email" data-parsley-trigg
       er="keyup" class="form-control"  style="padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px; box-sizing: border-box;"/>
      </div>
      <div class="form-group">
       <input type="submit" id="login" name="pwdrst" value="Send Password Reset Link" class="submit" />
       </div>
       
      
     </form>
     </div>
   </div>  
  </div>
  
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
  <!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>