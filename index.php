<?php
require 'conn.php';

?>


<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
<img src="shopping cart/images/Logo.png" alt="Logo" style="float:left; height:100%;">
    <form action="login.php" method="post" style="padding:232.2px;border: 3px solid #d66a6c;">
        
    <!--Error Prompt-->
    <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>


<?php } ?>
<?php if (isset($_GET['ok'])) { ?>

<p class="ok"><?php echo $_GET['ok']; ?></p>


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
     <button type="submit">Login</button>
    </form>


   






</body>
</html>