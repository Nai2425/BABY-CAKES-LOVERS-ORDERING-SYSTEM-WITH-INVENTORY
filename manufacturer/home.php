<?php
//include auth_session.php file on all user panel pages
include("../auth_session.php");
?>

<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="../css/css2.css">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
<div class="header" id="header">
  <a href="#default" class="logo">Baby's Cake</a>
  <div class="header-right">
    
  <a href="#" class="notif" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-bell" id="noti_number"  ></i></a>
  
    <a href="logout.php">Logout</a>
  </div>
</div>
<div class="sidebar">
<a  href="../home.php" class="active"><i class="fa fa-home">&nbsp;</i>Home</a>
  <a  href="../productlist.php" ><i class="fa fa-list">&nbsp;</i>Product List</a>
  <a  href="../productcat.php"><i class="fa fa-bars">&nbsp;</i>Product Category</a>
  <a  href="../transaction.php" class="active"><i class="fa fa-money">&nbsp;</i>Transaction</a>
  <a  href="../reservation.php"><i class="fa fa-list-alt">&nbsp;</i>Reservation</a>
  <a  href="../chatbot.php"><i class="fa fa-comments">&nbsp;</i>Chatbot</a>
  <a  href="supplier.php"><i class="fa fa-list" >&nbsp;</i>Supplier List</a>
  <a  href="productup.php" ><i class="fa fa-bars">&nbsp;</i>Product Update List</a>
  <a  href="Ingredients.php" ><i class="fa fa-list-ol">&nbsp;</i>Ingredients List</a>
     
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Unread Notifications</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="card-body">

<table class="table table-bordered table-striped" style="max-height: 100px;" id="datatable">
    <thead>
        <tr>
            <th style="text-align:center;">Notification</th>
            <th style="text-align:center;">Date</th>
     
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = "SELECT * from notification where status = 'manufacturer' order by id DESC;";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $product)
                {
                    ?>
                    <tr>
                    
                        <td style="text-align: center;"><?= $product['message']; ?></td> 
                        <td style="text-align: center;"><?= $product['date']; ?></td> 
                                                          
                    </tr>
                    <?php
                }
            }
            else
            {
                echo "<h5> No Record Found </h5>";
            }
        ?>
        
    </tbody>
</table>

</div>
        </div>
        <div class="modal-footer">
        
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>





 

    


    

















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>





    
    <script>
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "data.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>

</body>

</html>

