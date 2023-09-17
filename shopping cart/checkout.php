<?php
include("auth_session.php");
@include '../conn.php';

if(isset($_POST['order_btn'])){

   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $email = $_POST['email'];
   $number = $_POST['number'];
   $datepick = $_POST['datep'];
  
   $cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE username='{$_SESSION['username']}'");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $prodname = $product_item['product_name'];
         $quan = $product_item['quantity'];
         $detail_query = mysqli_query($conn, "UPDATE product SET quantity = quantity - '$quan' WHERE product_name ='$prodname' ") or die('query failed');
         $sel = mysqli_query($conn, "SELECT * FROM product where quantity = 0 and product_name = '$prodname'");
      if(mysqli_num_rows($sel) > 0){
         $up = mysqli_query($conn, "UPDATE product SET status = 'Not Available' WHERE product_name ='$prodname' ") or die('query failed');
         
      }
         $product_price = floatval($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
         
         // Insert each product separately into the reservation table
         $detail_query = mysqli_query($conn, "INSERT INTO `reservation`(firstname,lastname,email,number, dateofpickup,productname,quantity,producttotal,username,date,status,rated) VALUES('$fname','$lname','$email','$number','$datepick','$prodname','$quan','$product_price','{$_SESSION['username']}',CURRENT_TIMESTAMP(),'Pending','0')") or die('query failed');
      };
   };

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for Reserving!</h3>
         <div class='order-detail'>
            <span>The total cost of all the products that you have reserved.</span>
            <span class='total'> total : ₱".$price_total."  </span>
         </div>
         <div class='customer-details'>
            <p> your fullname : <span>".$lname." , &nbsp;".$fname."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your preffered date to pick up the product is : <span>".$datepick."</span> </p>
           
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";

      $detail_query = mysqli_query($conn, "DELETE FROM cart WHERE username='{$_SESSION['username']}'") or die('query failed');
      

   }
   

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
    /* Modal CSS */
    #modal-container {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }
    #modal-content {
      background-color: white;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }
    .close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
  </style>
</head>
<body>
<div id="modal-container">
    <div id="modal-content">
   
      <h1 style="font-size:30px;text-align:center;">NOTICE!</h1>
      <p style="font-size: 20px;">We understand that timely pickup is important to our customers. As soon as your cake is finished before the scheduled pickup date, we will notify you through our mobile app and via text messages. This notification will serve as a reminder for you to come and collect your order.

Please ensure that you have provided accurate contact information, including a valid mobile number during the reservation process. This will allow us to keep you updated regarding the availability of your cake for pickup.

We appreciate your understanding and cooperation as we strive to maintain the freshness and quality of our cakes.</p>
<button id="modal-close-btn" style="margin-left: 48%;font-size:20px;background-color:#888;color:white;">Close</button>
</div>
  </div>
  <script>
   
    function showModal() {
      document.getElementById("modal-container").style.display = "block";
    }
    window.onload = showModal;
    
  </script>
   <script>
    var modalContainer = document.getElementById("modal-container");
    var modalCloseBtn = document.getElementById("modal-close-btn");

    function showModal() {
      modalContainer.style.display = "block";
    }
    function hideModal() {
      modalContainer.style.display = "none";
    }
    window.onload = showModal;
    modalCloseBtn.onclick = hideModal;
  </script>
<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">
   <h1 class="heading">complete your Reservation</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE username='{$_SESSION['username']}'");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = floatval($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['product_name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : ₱<?=floatval($grand_total); ?> </span>
   </div>
   <?php 
                                    $query = "SELECT * FROM account where username = '{$_SESSION['username']}'";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $product)
                                        {
                                            ?>



 <div class="flex">
         <div class="inputBox">
            <span>your firstname</span>
            <input type="text" value="<?= $product['firstname']; ?>" name="firstname" readonly>
         </div>
         <div class="inputBox">
            <span>your lastname</span>
            <input type="text" value="<?= $product['lastname']; ?>" name="lastname" readonly>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="tel" title="Example Number:09*********" placeholder="enter your number" name="number" pattern="(09|\+639)\d{9}" maxlength="11" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" value="<?= $product['email']; ?>" name="email" readonly>
         </div>

         <?php 
   $result = mysqli_query($conn, "SELECT dateofpickup FROM reservation WHERE username='{$_SESSION['username']}' and status='In Queue' or status = 'Baking' or status = 'Bake'");
   if (mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_assoc($result);
       if ($row['dateofpickup'] !== null) {
           $orderDate = $row['dateofpickup'];
           
       } else {
          
       }
   } else {
      $orderDate = date('Y-m-d H:i:s');
   }


   
?>
<div class="inputBox">
   <span>Your Preferred Date to Pick Up</span>
   <input type="datetime-local" name="datep" id="datep" required>
  
</div>




<script>
   var inputField = document.getElementById("datep");
   var now = new Date();
   var orderDate = new Date("<?php echo $orderDate; ?>");
   var estimatedDays = document.getElementById("estimatedDays");

   inputField.addEventListener("change", function() {
      var selectedDate = new Date(inputField.value);
      var differenceInMilliseconds = selectedDate.getTime() - now.getTime();
      var differenceInDays = Math.ceil(differenceInMilliseconds / (1000 * 60 * 60 * 24));
      var threeDaysAfterNow = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 2);
      
      if (selectedDate <= now) {
         alert("Please choose a date and time that is after today's date.");
         inputField.value = "";
         estimatedDays.textContent = "";
      } 
   });
</script>



      </div>
      <input type="submit" value="Reserve now" name="order_btn" class="btn">       














                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
         
      
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>