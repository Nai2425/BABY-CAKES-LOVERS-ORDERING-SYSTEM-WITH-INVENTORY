<?php

//include auth_session.php file on all user panel pages


@include '../conn.php';


if(isset($_POST['add_to_cart'])){

    header("Location: loginn.php?error=You must Login First");
 
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/message.css">
   <!-- custom css file link  -->
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style3.css">
</head>
<body>
   


<div class="header" id="header">
  <a href="#default" class="logo">(Store Name Here)</a>

  <div class="header-right">
    
  <a href="index.php">Home</a>
    <a href="loginn.php">Login</a>
    <a href="view.php">View Product</a>
    <a href="#">About Us</a>
  </div>
</div>

<div class="container">

<section class="products">
    

   <h1 class="heading">Cakes Menu</h1>
 
                     
         
   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `product` where status = 'available'  order by  RAND() ");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post" name="re">
      
         <div class="box">

         <?php echo '<img src="data:image;base64,'.base64_encode($fetch_product['image']).'" style="width: 263px; height:170px;"class="img-fluid" >' ?>
            <h3><?php echo $fetch_product['product_name']; ?></h3>
            <div class="price">₱<?php echo $fetch_product['price']; ?></div>
            <input type="submit" class="btn" value="Buy Now" name="add_to_cart">

         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>


<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>