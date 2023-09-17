<html>
<head>
    <title></title>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Baby's Cake</title>
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/message.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    
<style>
  .formaa{
    margin-top: 10px;
margin-right: 20px;
margin-bottom: 30px;
margin-left: 40px;
  }
  @media only screen and (max-width: 720px) {

 .forma input{
     width:100%;
 }
 .valo{
     font-size:15px;
 }
  h1{
      font-size:30px;
  }
    h2{
      font-size:20px;
  }
.forma  #password-message{
     color:red;
     font-size:20px;
 }
 label{
     text-align:center;
     
 }
 .forma #em{
     margin-right:50px;
 }
     
 
  }
  h1{
      font-size:50px;
  }
    h2{
      font-size:40px;
  }
   .valo{
     font-size:15px;
 }
 #password-message{
     color:red;
     font-size:20px;
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
<div class="form" style="margin-bottom:10px">
<h1 style="text-align:center;">Baby's Cake</h1>
<h2 style="text-align:center;">Create Account</h2>
    <form action="create.php" method="post" class="formaa">
    <!--Error Prompt-->
    <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
<!--Form-->

     <div class="forma">
     <label for="firstname" style="font-family: Comfortaa, sans-serif; font-size: 25px;;">First Name: </label>
     <input type="text" name="firstname" placeholder="Input Firstname" id="firstname" required>
     </div>
     <div class="forma">
     <label for="lastname" style="font-family: Comfortaa, sans-serif; font-size: 25px;;">Last Name:</label>
     <input type="text" name="lastname" placeholder="Input Lastname" id="lastname" required>
     </div>
     <div class="forma">
        <label for="username" style="font-family: Comfortaa, sans-serif; font-size: 25px;;">Username: </label>
        <input type="text" name="username" id="username" placeholder="Input Username" required>
     </div>
     <div class="forma">
     <label for="password" style="font-family: Comfortaa, sans-serif; font-size: 25px;;">Password: </label>
     <input type="password" name="password" placeholder="Input Password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
     <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid"> <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<style>
    #message h3 {
  
  font-size:18px;
  
}
  #message {
  display:none;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}
  /* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -10px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -10px;
  content: "✖";
}
  </style>
     </div>
     <div class="forma">
     <label for="email" style="font-family: Comfortaa, sans-serif; font-size: 25px; margin-left:52px;" id="em">Email:</label>
     <input type="email" name="email" placeholder="Input Email" id="email" required>
     </div>


     <div class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
   
    <h3>Terms and Conditions for Our Cake Stores</h3>
    <br>
    <h4>1.	Made-to-Order Cakes: </h4>
    <p>•	Our cakes are made to order, which means that the cake will be prepared specifically for you once you place your order. We do not keep pre-made cakes in stock.</p>
   <br>
    <h4>2.	Ordering and Pickup Time: </h4>
    <p>•	We require a minimum of 4 days' notice for cake orders. This allows us sufficient time to prepare your cake to our highest standards. Please ensure that you place your order with ample time before your desired pickup date.</p>
    <br>
    <h4>3.	Payment:  </h4>
    <p>•	Payment for your order is due in cash upon pickup. We do not accept online or credit card payments at this time.</p>
    <br>
    <h4>4.	Cancellation Policy:  </h4>
    <p>•You may cancel your order without penalty as long as the order has not yet entered the baking process. Once your order has entered the baking stage, cancellation is no longer possible, and any deposit payment made will be non-refundable.</p>
    <br>
    <h4>5.	Failure to Pickup:   </h4>
    <p>•	If you fail to pick up your cake at the scheduled date and time, your order will be cancelled, and any deposit payment made will be forfeited. We cannot guarantee the availability of your cake for rescheduling in such cases.</p>
    <br>
    <h4>6.	Refusal of Service:   </h4>
    <p>•	We reserve the right to refuse service to customers who have a history of no-shows or cancellations. Our priority is to provide quality service to customers who respect our policies and commitments.</p>
    <br>
    <h4>7.Personal Information:   </h4>
    <p>•	By using our service, you acknowledge and agree that we may collect and use your personal information, including but not limited to your name, email address, and phone number, for the purpose of providing our service and improving our user experience. We will not share your personal information with third parties, except as required by law or as necessary to fulfill our obligations to you. We will take reasonable measures to protect your personal information from unauthorized access or disclosure. By providing your personal information to us, you consent to our collection, use, and disclosure of your personal information as described in this term and condition.</p>
    <br>
    <br>
    <p>By creating a account, you agree to abide by these terms and conditions.</p>
    <br>
    <br>
    <br>
    <img src="images/Logo.png" width="200" height="200">
  </div>
</div>


<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Close Button */
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
 .modal-content h3{
font-size: 30px;
}
.modal-content h4{
font-size: 25px;
}
.modal-content p{
font-size: 20px;
}

</style>
     <p style="font-size:15px"><input type="checkbox" required >&nbsp;I agree to the &nbsp;<a href="#" class="valo" name="valo" style="color:red;" id="modl">Terms and Conditions.</a></p>
    <br>
     <button type="submit" name="submit" class="submit" id="submit">Create</button>
    </form>

    <a href="loginn.php" class="valo" name="valo">You already have an account? Click me.</a>
    <br>
  </div>
   


<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box


myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

</body>
</html>