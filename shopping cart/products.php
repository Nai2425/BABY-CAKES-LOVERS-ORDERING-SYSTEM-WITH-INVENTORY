<?php
include("auth_session.php");
@include '../conn.php';

if (isset($_POST['add_to_cart'])) {
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $quan = $_POST['quantity'];

  $select_carta = mysqli_query($conn, "SELECT Quantity FROM product WHERE product_name = '$product_name'");
  $row_carta = mysqli_fetch_assoc($select_carta);
  $quantity_available = $row_carta['Quantity'];

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_name = '$product_name' AND username='{$_SESSION['username']}'");

  if ($quan > $quantity_available) {
    $message[] = 'The quantity you have input is greater than the actual quantity of the product.';
  } elseif (mysqli_num_rows($select_cart) > 0) {
    $message[] = 'Product already added to cart.';
  } else {
    $insert_product = mysqli_query($conn, "INSERT INTO `cart`(product_name, price, quantity, totalprice, username) VALUES('$product_name', '$product_price', '$quan', '0.00', '{$_SESSION['username']}')");
    $message[] = 'Product added to cart successfully.';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- font awesome cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- custom css file link -->
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* Styles for the modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .container .box-container .box .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 800px;
    }

    .comment {
      margin-bottom: 20px;
      display: flex;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
    }

    .comment-header {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .container .box-container .box .modal-content .comment .comment-header .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .comment-info {
      display: flex;
      flex-direction: column;
    }

    .username {
      margin: 0;
    }

    .timestamp {
      color: #999;
    }

    .comment-body {
      margin: 0;
    }

    .comment-body p {
      margin: 0;
    }

    .comment .comment-header h3 {
      font-size: 30px;
    }

    .comment .comment-body p {
      margin-top: 80px;
      margin-left: 50px;
      font-size: 20px;
    }

    .close {
      font-size: 25px;
      margin-left: 100%;
      cursor: pointer;
    }

    .container .box-container .box .modal-content h1 {
      font-size: 25px;
      text-align: center;
    }
  </style>
</head>

<body>


  <?php
  if (isset($message)) {
    foreach ($message as $msg) {
      echo '<div class="message"><span>' . $msg . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
  }
  ?>

  <?php include 'header.php'; ?>

  <div class="container">
    <section class="products">
      <h1 class="heading">Cakes Menu</h1>
      <hr color="red" size="5" width="100%" align="center">
      <div class="box-container" style="margin-top:20px">
        <?php
        $select_products = mysqli_query($conn, "SELECT * FROM `product` WHERE status = 'available'");
        if (mysqli_num_rows($select_products) > 0) {
          while ($fetch_product = mysqli_fetch_assoc($select_products)) {
        ?>
            <form action="" method="post" name="re">
              <div class="box">
                <!-- Product details -->
                <?php echo '<img src="data:image;base64,' . base64_encode($fetch_product['image']) . '" style="width: 263px; height:170px;" class="img-fluid" >' ?>
                <h3><?php echo $fetch_product['product_name']; ?></h3>
                <div class="price">₱<?php echo $fetch_product['price']; ?></div>
                <p style="font-size:20px">Description: <?php echo $fetch_product['description']; ?></p>
                <p style="font-size:20px">Quantity: <?php echo $fetch_product['Quantity']; ?></p>
                <p style="font-size:20px">Rating:
                  <?php
                  $prod = $fetch_product['product_name'];
                  $select_productsa = mysqli_query($conn, "SELECT AVG(star) as rating FROM `rate` WHERE productname = '$prod'");
                  if (mysqli_num_rows($select_productsa) > 0) {
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
                <input type="number" name="quantity" required style="border:1px solid;border-color:#2980b9;" placeholder="Input Quantity...." min="0">
                <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                <input type="submit" class="btn" value="🛒 add to cart" name="add_to_cart" onClick="window.location.reload();">
                <br>
                <button type="button" class="com" style="font-size:15px;background-color:transparent;cursor:default;" onclick="openModal('<?php echo $fetch_product['product_name']; ?>')">👁️ View Comments</button>

                <!-- Modal -->
                <div id="<?php echo $fetch_product['product_name']; ?>Modal" class="modal">
                  <!-- Modal content -->
                  <div class="modal-content">
                    <span class="close" onclick="closeModal('<?php echo $fetch_product['product_name']; ?>')" style="font-size:30px;font-weight:bold;">&times;</span>
                    <h1 style="font-size: 20px;text-align:center;">Comments about <?php echo $fetch_product['product_name']; ?>:</h1>
                    <br>
                    <?php
                    $product_name = $fetch_product['product_name'];
                    $query = "SELECT account.image AS image, rate.star AS star, rate.username AS username, rate.comment AS comment, rate.date AS date FROM account JOIN rate ON account.username = rate.username WHERE rate.productname = '$product_name'";
                    $query_run = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($query_run)) {
                      $username = $row["username"];
                      $image = base64_encode($row['image']);
                      $date = $row["date"];
                    ?>

                      <div class="comment">
                        <div class="comment-header">
                          <img class="avatar" src="data:image;base64,<?php echo $image; ?>" alt="User Avatar">
                          <h3 class="username" style=""><?php echo $username; ?></h3>
                        </div>
                        <div class="comment-body">
                          <p><?php echo $row['comment']; ?></p>
                        </div>
                      </div>
                      <p style="font-size:20px" class="rate">Rate: <?php
                                                                    $rating = $row['star'];

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
                                                                    ?></p>
                      <p style="font-size:15px" class="date">Date: <?php echo $date; ?></p>
                    <?php
                    }
                    ?>
                  </div>
                </div>
                <script>
                  // JavaScript functions to open and close the modal
                  function openModal(productName) {
                    document.getElementById(productName + "Modal").style.display = "block";
                  }

                  function closeModal(productName) {
                    document.getElementById(productName + "Modal").style.display = "none";
                  }
                </script>
              </div>
            </form>
        <?php
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