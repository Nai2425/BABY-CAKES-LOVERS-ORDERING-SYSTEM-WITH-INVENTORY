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
  .formaa{
    margin-top: 10px;
margin-right: 20px;
margin-bottom: 30px;
margin-left: 40px;
  }
  @media only screen and (max-width: 720px) {
 h1{
  font-size: 50px;

 }
 h2{
  font-size: 30px;
 }
 .signup{
  font-size: 15px;
 }
 .forma input{
     width:100%;
 }
 
 
  }
  h1{
    font-size:50px;
  }
  h2{
  font-size: 30px;
 }
  .signup{
  font-size: 15px;
 }
 .fpass{
     font-size:15px;
 }
 .formaa .error{
     font-size:20px;
     
 }
  .formaa .ok{
     font-size:20px;
     
 }

</style>
</head>

<body>





<?php include 'header2.php'; ?>
<h1 style="text-align:center;">Baby's Cake</h1>
<h2 style="text-align:center;">Login</h2>
    <form action="login.php" method="post" class="formaa">
    <!--Error Prompt-->
    <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>


<?php } ?>
<?php if (isset($_GET['ok'])) { ?>

<p class="ok"><?php echo $_GET['ok']; ?></p>


<?php } ?>

<!--Form-->

    <div class="forma">
     <label for="username" style="font-family: Comfortaa, sans-serif; font-size: 25px;;">Username: </label>
     <input type="text" name="username" placeholder="Input Username" value="<?= isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>"  required>
     </div>
     <div class="forma">
     <label for="password"  style="font-family: Comfortaa, sans-serif; font-size: 25px;;">Password: </label>
     <input type="password" name="password" placeholder="Input Password" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" required>
     </div>
        <div class="form-check">
             <input class="form-check-input" type="checkbox" value="" id="rememberMe" name="rememberMe" <?= (isset($_COOKIE['username']) && isset($_COOKIE['password'])) ? "checked" : '' ?>>
                                    <label class="form-check-label" for="rememberMe" style="font-size:20px">
                                        Remember Me
                                    </label>
                                </div>
     <button type="submit" class="submit">Login</button>
    </form>

    <a href="createe.php" class= "signup">Don't have any account? Sign up here!</a>
    <br>
    <br>
    <a href="forgot.php" class= "fpass">Forgot password? Click Here</a>
   




<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>