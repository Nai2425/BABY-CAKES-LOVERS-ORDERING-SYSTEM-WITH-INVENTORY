<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");

?>

<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css2.css">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
<div class="header" id="header">
  <a href="#default" class="logo">Baby's Cake</a>
  <div class="header-right">
  <a href="#"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Account : <?php
// Query to get the total number of pending reservations
$query = "SELECT lastname  FROM users WHERE username='{$_SESSION['username']}'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if there is any result
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $reservations = $row['lastname'];
    
    // Display the bell icon only if there are pending reservations
    if ($reservations > 0) {
        echo $reservations;
    }
    
   
} 
?></a>
    <a href="logout.php">Logout</a>
  </div>
</div>
<?php include 'header.php'; ?>

<!-- edit modal-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Do you want to update the status of this customer to paid? it will affect all the customers reservation.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="function/addprodd.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                           
                            <input type="hidden" name="pname" id="pname" class="form-control"
                               >
                        </div>

                        <div class="form-group">
                           
                            <input type="hidden" name="quan" id="quan" class="form-control"
                                >
                        </div>
                         <div class="form-group">
                           
                            <input type="hidden" name="user" id="user" class="form-control"
                                >
                        </div>
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" id="fname" class="form-control"
                                 readonly>
                        </div>
                        <div class="form-group">
                        <label>Lastname</label>
                            <input type="text" name="lname" id="lname" class="form-control"
                               readonly>
                        </div>
                        
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"onClick="window.location.reload();">Close</button>
                        <button type="submit" name="updateres" class="btn btn-primary">Paid</button>
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
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Product Data </h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="function/addprodd.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h5> Do you want to Delete this Data ??</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload();"> NO </button>
                        <button type="submit" name="deleteres" class="btn btn-primary"> Yes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


  <!--status modals -->
     <div class="modal fade" id="statusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Change Status of the Reservation </h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="function/addprodd.php" method="POST">

                    <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="stat_id" id="stat_id">
                           <div class="form-group">
                           
                            <input type="hidden" name="userr" id="userr" class="form-control"
                                >
                                <input type="hidden" name="pnamee" id="pnamee" class="form-control"
                               >
                               <input type="hidden" name="quann" id="quann" class="form-control"
                               >
                        </div>
                        <label for="statusa">Choose what status the status of the cake</label>
                        <br>
                         <select name="statusa" style="font-size:20px;width:100%;">
                            <option value="Preparing">Preparing</option>
                            <option value="Ready to pick up">Ready to Pick Up</option>
                         </select>   
                    </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload();"> Close </button>
                        <button type="submit" name="upstat" class="btn btn-primary"> Choose</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
 


    















<div class="container mt-4" style="width:100%;margin-left:220px;">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <?php if (isset($_GET['error'])) { ?>

<p class="error" ><?php echo $_GET['error']; ?></p>


<?php } ?>
<?php if (isset($_GET['oke'])) { ?>

<p class="oke"><?php echo $_GET['oke']; ?></p>


<?php } ?>
                        <h4>Reservation List
                               </h4>
                    </div>
                    <div class="card-body">
                   
                    <select type="date" id="search-date" name="stat"style="font-size:20px;float:right;">
                               <option value="Ready to pick up">Ready to pick up</option> 
                               <option value="Preparing">Preparing</option> 
                                <option value="Pending">Pending</option> 
                           </select>
                    
                        <table class="table table-bordered table-striped" id="datatableid">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>lastname</th>
                                  <th>Username</th>
                           
                                    <th>date of pickup</th>
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>status</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM reservation 
                                    WHERE status IN ('Pending', 'Preparing', 'Ready to pick up')
                                    ORDER BY CASE WHEN status = 'Pending' THEN 0 ELSE 1 END, status
                                    ";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $product)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $product['id']; ?></td>
                                                <td><?= $product['firstname']; ?></td>
                                                <td><?= $product['lastname']; ?></td>
                                            <td><?= $product['username']; ?></td>
                                         
                                                <td><?= date('Y-m-d', strtotime($product['dateofpickup'])); ?></td> <!-- Format date value -->
                    
                                                <td><?= $product['productname']; ?></td>
                                                 <td><?= $product['quantity']; ?></td>
                                                <td><?= $product['producttotal']; ?></td>
                                                <td><?= $product['status']; ?></td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                                                    
                                                    <br>
                                                    <br>
                                                    <?php if ($product['status'] === 'Ready to pick up') : ?>
                                                    <button type="button" class="btn btn-success editbtn"> PAID</button> 
                                                    <?php else: ?>
                                                        <button type="button" class="btn btn-success statbtn"> STATUS</button> 
                                                      <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php

                                        }
                                    }
                                    else
                                    {
                                        
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>


<script>
    $(document).ready(function () {
    $('#datatableid').DataTable();
    var table = $('#datatableid').DataTable();
        $('#search-date').on('change', function () {
            table.column(8).search(this.value).draw();
        });
});
</script>



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
                $('#pname').val(data[6]);
                $('#quan').val(data[7]);
                $('#fname').val(data[1]);
                $('#lname').val(data[2]);
                 $('#user').val(data[3]);
            });
        });
    </script>
    
    <script>
        $(document).ready(function () {

            $('.Available').on('click', function () {

                $('#status').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_idd').val(data[0]);
          
            });
        });
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
     <script>
        $(document).ready(function () {

            $('.statbtn').on('click', function () {

                $('#statusmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#stat_id').val(data[0]);
                $('#userr').val(data[3]);
                $('#pnamee').val(data[5]);
                $('#quann').val(data[6]);

            });
        });
    </script>
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
$('#closemodal').click(function() {
    $('#editmodal').modal('hide');
});
    </script>
    
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

