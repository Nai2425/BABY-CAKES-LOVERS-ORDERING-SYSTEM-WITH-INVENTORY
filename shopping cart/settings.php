<?php
include("auth_session.php");
@include '../conn.php';

if(isset($_POST['order_btn'])){

   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $email = $_POST['email'];
   if(isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])){
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $query = "UPDATE account SET email = '$email', lastname = '$lname', firstname= '$fname', image = '$file' where username = '{$_SESSION['username']}'";
  } else {
      $query = "UPDATE account SET email = '$email', lastname = '$lname', firstname= '$fname' where username = '{$_SESSION['username']}' ";
  }
  $query_run = mysqli_query($conn, $query);

  if($query_run){
    $message[] = 'Your Account has been successfully update.';

  }
  else{
      $message[] = 'Your Account has not been successfully update try again.';
 
  }
  

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Settings</title>

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

<section class="checkout-form">

   <h1 class="heading">Account Settings</h1>

   <form action="" method="post" enctype="multipart/form-data">

   
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
            <input type="text" value="<?= $product['firstname']; ?>" name="firstname" required>
         </div>
         <div class="inputBox">
            <span>your lastname</span>
            <input type="text" value="<?= $product['lastname']; ?>" name="lastname" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" value="<?= $product['email']; ?>" name="email" required>
         </div>
         <div class="inputBox">
         <span>your image</span> 
         <br> 
         <?php 
    $query = "SELECT image FROM account WHERE username = '{$_SESSION['username']}' ";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);
    
    if ($row && !empty($row['image'])) {
      echo '<img src="data:image;base64,'. base64_encode($row['image']) .'" name="image" style="width: 263px; height:170px;" class="img-fluid" ">';
    }
  ?>
  <input type="file" name="image" id="image" required accept="image/*" onchange="return fileValidation()">
         </div>
      </div>
      <input type="submit" value="Update Now" name="order_btn" class="btn">  
      
      <a href="changepass.php" class= "fpass" style="font-size:15px;">Do you want to change password? Click Here</a>




      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function fileValidation(){
    var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload image file only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

    </script>









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