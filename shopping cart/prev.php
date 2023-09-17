<?php
include("auth_session.php");
@include 'config.php';


if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `reservation` WHERE id = '$remove_id'");
   header('location:prev.php');
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- edit modal-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Cancel Reservation </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../function/addprodd.php" method="POST" >
                    
                    <div class="modal-body">
                    <input type="hidden" name="update_id" id="update_id" >
                        <h1>Are you sure do you want to cancel this reservation?</h1>
                        <div class="form-group">
                            <label for="prodc" style="font-size:22px">The product that you have choose to cancel is:</label>
                            <input type="text" name="prodc" id="prodc" class="form-control" style="border:none;outline:none;font-size:22px" disabled >
                        </div>
                    

                       <div class="form-group">
                    <label for="datep" style="font-size:22px">Reason of Cancellation:</label>
                    <textarea name="datep" id="datep" rows="4" cols="40" style="font-size:22px" placeholder="Input here your reason about the cancellation."></textarea>
                  
                    </div> 
                  
                    </div>
               
                             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"onClick="window.location.reload();">Close</button>
                        <button type="submit" name="cancelres" class="btn btn-primary">Cancel Reservation</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

   <!-- edit modal-->
   <div class="modal fade" id="recmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Thank you Customer </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../function/addprodd.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="modal-body">
                    <input type="hidden" name="update_id" id="update_id" >
                    <h1 style="text-align:center;">Your Receipt <span>🧾</span></h1>
                  <br>
                  <br>
                        <h2 style="text-align:center;">Thank you for buying our product, sir/ma'am <span>🎉</span></h2>
                        <br>

                        <h3 style="text-align:center;">We hope you have a great day.</h3>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                        <h3>The Product that you have bought: <span id="prodcc"></span></h3>
                        <br>
                        <h3>Total Price: <span id="pricee"></span></h3>  
                        <br>
                        <h3>Date of Pickup: <span id="pick"></span></h3>  
                        </div>

                     
                        
                    </div>
               
                             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"onClick="window.location.reload();">Close</button>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>
<!--star rating-->
    <div class="modal fade" id="starmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Rate our Cake </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../function/addprodd.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="modal-body">
                    <input type="hidden" name="tfid" id="tfid" >
                    
                    <h1 style="text-align:center;">Rate our product <span><i class="fa fa-star" aria-hidden="true" ></i> &nbsp;</span></h1>
                  <br>
                  <br>
                       
                  <div class="form-group">
    <label for="star" style="font-size: 20px;">Rate our product by choosing how many stars you want to give:</label>
    <div id="star-rating" style="font-size: 30px;">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
    </div>
    <style>
    .star {
        color: gray;
        cursor: pointer;
    }

    .star.selected {
        color: gold;
    }
</style>
<div class="form-group">
                            
<input type="hidden" name="pradact" id="pradact" class="form-control"/>

                        </div>
    <input type="hidden" name="rating" id="rating" required>

</div>
<div class="form-group">
    <label for="comment" style="font-size: 20px;">Comment/Suggestion:</label>
    <textarea class="form-control" name="comment" id="comment" rows="3" style="font-size: 20px;"></textarea>
</div>

                     
                        
                    </div>
               
                             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"onClick="window.location.reload();">Close</button>
                         <button type="submit"  class="btn btn-primary" name="addstar"><i class="fa fa-star" aria-hidden="true"></i> &nbsp;Rate Cancel Reservation</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
        <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Data </h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../function/addprodd.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h5 style="font-size:30px"> Do you want to Delete this Reservation??</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload();"> NO </button>
                        <button type="submit" name="deletewow" class="btn btn-primary"> Yes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Reservation History</h1>
   
   <table>

      <thead>
      <th>Order ID</th>
         <th>Products Ordered</th>
         <th>Date Pickup</th>
         <th>Quantity</th>
         <th>total price</th>
         <th>Date</th>
         <th>Status</th>
         <th>Action</th>
      </thead>

      <tbody>

         <?php 
  
        
         $select_cart = mysqli_query($conn, "SELECT * FROM `reservation` where username= '{$_SESSION['username']}' GROUP BY id desc");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
         <td>
    <?php echo $fetch_cart['id']; ?>
</td>
<td>
    <?php echo $fetch_cart['productname']; ?>
</td>
<td>
    <?php echo $fetch_cart['dateofpickup']; ?>
</td>
<td>
    <?php echo $fetch_cart['quantity']; ?>
</td>
<td>
    ₱<?php echo number_format($fetch_cart['producttotal']); ?>
</td>
<td>
    <?php echo $fetch_cart['date']; ?>
</td>
<td>
    <?php echo $fetch_cart['status']; ?>
</td>
<td>
<?php if ($fetch_cart['status'] === 'Preparing') : ?>
    <button type="button" class="btn btn-success editbtn" disabled  style="background-color:#f5f564;color:black;"><i class="fa fa-birthday-cake" aria-hidden="true"></i>&nbsp; Preparing</button>
<?php elseif ($fetch_cart['status'] === 'Cancelled by user') : ?>
    <button type="button" class="btn btn-editbtn" style="background-color:Black;color:white;"disabled><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;Cancelled by User</button>
   
<?php elseif ($fetch_cart['status'] === 'Ready to pick up') : ?>
    <button type="button" class="btn btn-success editbtn" disabled><i class="fa fa-check" aria-hidden="true"></i> &nbsp;Ready to pick up</button>   
    <?php elseif ($fetch_cart['status'] === 'Claimed') : ?>
    <!--<button type="button" class="btn btn-success editbtn" disabled> <i class="fa fa-heart" aria-hidden="true"></i> &nbsp;Claimed</button>--> 
    <button type="button" class="btn btn-success recbtn" style="background-color:#f5f564;color:black;" > Receipt</button> 
      <?php if ($fetch_cart['rated'] === '0.00') : ?>
        <button type="button" class="btn btn-success starbtn" style="background-color:orange;color:white;" ><i class="fa fa-star" aria-hidden="true"></i> &nbsp; Rate</button> 
        <?php elseif ($fetch_cart['rated'] === '1.00') : ?> 
            <button type="button" class="btn btn-success starbtn" style="background-color:orange;color:white;" disabled ><i class="fa fa-star" aria-hidden="true"></i> &nbsp; Rated</button> 
     
        <?php endif; ?>
    <?php elseif ($fetch_cart['status'] === 'Void') : ?>
    <button type="button" class="btn btn-success editbtn" disabled style="background-color: black;color:white;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; Failed to get the product</button>   
    <?php else: ?>
    <button type="button" class="btn btn-success editbtn">Cancel Reservation</button>
<?php endif; ?>

</td>

         </tr>
         <?php
          
            };
         }else{
            echo "<h1 style='text-align:center;color:red;'>You dont have any Reservation History.</h1>";
         };
         ?>
         

      </tbody>

   </table>



</section>

</div>
    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#prodc').val(data[1]);
                $('#kua').val(data[3]);
             
            });
        });

    </script>
        <script>
        $(document).ready(function () {

            $('.starbtn').on('click', function () {

                $('#starmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text().trim();
                }).get();

                console.log(data);

                $('#tfid').val(data[0]);
                $('#pradact').val(data[1]);
            
             
            });
        });

    </script>
    <script>
  $(document).ready(function () {
    $('.recbtn').on('click', function () {
      $('#recmodal').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function () {
        return $(this).text();
      }).get();
      console.log(data);
      $('#update_id').val(data[0]);
      $('#prodcc').text(data[1]);
      $('#pricee').text(data[4]);
      $('#pick').text(data[2]);
    });
  });
</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');

    stars.forEach((star) => {
        star.addEventListener('mouseover', () => {
            const value = star.getAttribute('data-value');
            highlightStars(value);
        });

        star.addEventListener('mouseout', () => {
            const value = ratingInput.value;
            highlightStars(value);
        });

        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            ratingInput.value = value;
            highlightStars(value);
        });
    });

    function highlightStars(value) {
        stars.forEach((star) => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }
</script>





    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>