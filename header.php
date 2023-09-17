<div class="sidebar">
  <button class="accordion"><i class="fa fa-home">&nbsp;</i>Home</button>
  <div class="panel">
    <a href="home.php" ><i class="fa fa-home">&nbsp;</i>Home</a>
  </div>
  
  <button class="accordion"><i class="fa fa-list">&nbsp;</i>Product List</button>
  <div class="panel">
    <a href="productlist.php" >Product List</a>
    <a href="productcat.php" >Product Category</a>
  </div>
 <button class="accordion"><i class="fa fa-list">&nbsp;</i>Reservation  
<?php
// Query to get the total number of pending reservations
$query = "SELECT COUNT(*) as reservations FROM reservation WHERE status = 'Pending'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if there is any result
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $reservations = $row['reservations'];
    
    // Display the bell icon only if there are pending reservations
    if ($reservations > 0) {
        echo '<sup><i class="fa fa-bell" style="font-size:15px;color:red;"></i></sup>';
    }
    
   
} 
?>
</button>


</button>
  <div class="panel">
   
  <a href="reservation.php" >
<p style="font-size: 13px;color:red;font-size:15px;"> Pending ( <?php
    
    
   

    // Query to get the total number of pending reservations
    $query = "SELECT COUNT(*) as reservations FROM reservation WHERE status = 'Pending'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if there is any result
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['reservations'];
    } else {
        echo "0";
    }

  
?> )</p>
<p style="font-size: 13px;color:yellow;font-size:15px;"> Preparing ( <?php
    
    
   

    // Query to get the total number of pending reservations
    $query = "SELECT COUNT(*) as reservations FROM reservation WHERE status = 'Preparing'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if there is any result
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['reservations'];
    } else {
        echo "0";
    }

  
?> )</p>
<p style="font-size: 13px;color:green;font-size:15px;"> Ready To Pickup ( <?php
    
    
   

    // Query to get the total number of pending reservations
    $query = "SELECT COUNT(*) as reservations FROM reservation WHERE status = 'Ready to pick up'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if there is any result
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['reservations'];
    } else {
        echo "0";
    }

  
?> )</p>
<p style="text-align:center; font-size:15px">(Click to View)</p>
</a>

  </div>
  



  <button class="accordion"><i class="fa fa-money">&nbsp;</i>Transaction</button>
  <div class="panel">
    <a href="transaction.php">Transaction</a>
   
   
  </div>
  <button class="accordion"><i class="fa fa-list">&nbsp;</i>Manufacturer</button>
  <div class="panel">
    <a href="manufacturer/supplier.php">Supplier List</a>
    <a href="manufacturer/productup.php">Product Update List</a>
    <a href="manufacturer/Ingredients.php">Ingredients List</a>
    <a href="transacing.php" >Product Inventory History</a>
  </div>
  
  <button class="accordion"><i class="fa fa-comments">&nbsp;</i>Chatbot</button>
  <div class="panel">
    <a href="chatbot.php" >Chatbot</a>
  </div>
  

</div>

<script>
// Get all the accordion buttons
var acc = document.getElementsByClassName("accordion");

// Loop through them and add a click event listener
for (var i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    // Toggle the active class
    this.classList.toggle("active");
    
    // Get the corresponding panel
    var panel = this.nextElementSibling;
    
    // Toggle the panel's visibility
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

<style>
/* Style the accordion buttons */
.accordion {
  background-color: #6dd5ed;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
  font-weight: bold;
  font-size: 20px;
}

/* Style the active class */
.active, .accordion:hover {
  background-color: whitesmoke;
}

/* Style the panel */
.panel {
 
  display: none;
  overflow: hidden;
}
</style>