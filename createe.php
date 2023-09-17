<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <form action="create.php" method="post">
    <!--Error Prompt-->
    <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
<!--Form-->
    <div class="forma">
     <label for="username">Username: </label>
     <input type="text" name="username" placeholder="Input Username...." required>
     </div>
     <div class="forma">
     <label for="password">Password: </label>
     <input type="password" name="password" placeholder="Input Password...." required>
     </div>
     <div class="forma">
     <label for="email">Email: </label>
     <input type="email" name="email" placeholder="Input Email...." required>
     </div>
     <div class="forma">
     <label for="firstname">First Name: </label>
     <input type="text" name="firstname" placeholder="Input firstname...." required>
     </div>
     <div class="forma">
     <label for="lastname">Last Name: </label>
     <input type="text" name="lastname" placeholder="Input lastname...." required>
     </div>
     <button type="submit" name="submit" class="submit">Create</button>
    </form>

    <a href="index.php">You already have an account? Click me.</a>
    <br>
    
   






</body>
</html>