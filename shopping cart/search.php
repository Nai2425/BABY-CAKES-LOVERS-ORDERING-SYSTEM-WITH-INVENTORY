<?php
include("auth_session.php");
@include '../conn.php';
if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $quan = $_POST['quantity'];
 

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_name = '$product_name' AND username='{$_SESSION['username']}'");

  if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{

      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(product_name, price,quantity,totalprice,username) VALUES('$product_name', '$product_price', '$quan','0.00','{$_SESSION['username']}')");
      $message[] = 'product added to cart succesfully';
      

  
   }

}




// Retrieve all the available product categories
$select_categories = mysqli_query($conn, "SELECT DISTINCT product_catn FROM `product`");
$categories = array();
while ($category = mysqli_fetch_assoc($select_categories)) {
    $categories[] = $category['product_catn'];
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

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">
<style>
  @media only screen and (max-width: 720px) {
  .top{
    display: none;

  }
.centered{
  font-size: 50px;
}
.logoo{
  width: 150px;
  height: 200px;
}
.row{
  display: none;
}
.ourteam{
  display: none;
}
.wrapper{
  width: 100%;
}
#myBtn{
    visibility: hidden;
}
#buttontit{
   
     visibility: hidden;
     
}
#chatbot-popup{
   visibility: hidden; 
}

}
  
#prod #search sech{
   color:black;
}

</style>

<section class="products" id="prod">

   <h1 class="heading">Search Cakes by Category</h1>
<form method="post" style="text-align:center;font-size:30px;" id="search">
            <label for="category" >Select a category:</label>
            <select id="category" name="category" style="text-align:center;font-size:25px;border-style:double;">
                <option value="">All</option>
                <?php foreach($categories as $category): ?>
                
                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Search" style="text-align:center;font-size:25px;background: #d66a6c;
    color: #fff;" name="sech"> 
        </form>
          
         
   <div class="box-container" style="margin-top:20px;">

      <?php
      if(isset($_POST['category'])){
    // Retrieve the selected category
    $selected_category = $_POST['category'];
    
    // Retrieve all products under the selected category
      if ($selected_category == "") {
        $select_products = mysqli_query($conn, "SELECT * FROM `product` WHERE status = 'available'");
    } else {
        $select_products = mysqli_query($conn, "SELECT * FROM `product` WHERE product_catn = '$selected_category' and status = 'available'");
    }

    // Display the products under the selected category
    if(mysqli_num_rows($select_products) > 0){
        while($fetch_product = mysqli_fetch_assoc($select_products)){
?>
            <form action="" method="post" name="re">
                <div class="box">
                    <?php echo '<img src="data:image;base64,'.base64_encode($fetch_product['image']).'" style="width: 263px; height:170px;"class="img-fluid" >' ?>
                    <h3><?php echo $fetch_product['product_name']; ?></h3>
                    <div class="price">₱<?php echo $fetch_product['price']; ?></div>
                    <p style="font-size:20px">Available Quantity : <?php echo $fetch_product['Quantity']; ?></p>
                    <p style="font-size:20px">Rating:
    <?php
    $prod = $fetch_product['product_name'];
    $select_productsa = mysqli_query($conn, "SELECT AVG(star) as rating FROM `rate` WHERE productname = '$prod'");
    if(mysqli_num_rows($select_productsa) > 0){
        $fetch_producta = mysqli_fetch_assoc($select_productsa);
        $rating = $fetch_producta['rating'];
        
        if ($rating !== null) {
            $rounded_rating = round($rating); // Round the rating value to the nearest whole number

            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $rounded_rating) {
                    echo '<i class="fas fa-star" style="color: gold;"></i>'; // Display a filled star for each whole rating
                } else {
                    echo '<i class="far fa-star"></i>'; // Display an empty star for the remaining ratings
                }
            }
        } else {
            echo 'No ratings available.';
        }
    } else {
        echo 'No ratings available.';
    }
    ?>
</p>
                    <input type="number" name="quantity" required style="border:1px solid;border-color:#2980b9;" placeholder="Input Quantity.." min="0">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                    <input type="submit" class="btn" value="add to cart" name="add_to_cart" onClick="window.location.reload();">
                </div>
            </form>
<?php
        };
    } else {
        echo "No products found under the selected category.";
    }
}
     
      ?>

   </div>

</section>

</div>


<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>