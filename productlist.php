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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="function/addprodd.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Product Name </label>
                            <input type="text" name="pname" id="pname" class="form-control"
                                placeholder="EnterProduct Name..">
                        </div>

                

                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="price" id="price" class="form-control"
                                placeholder="Enter Product Price....">
                        </div>
                        <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" id="image"  accept="image/*" onchange="return fileValidation()" >
                            </div>
                    </div>
                    <div class="form-group">
                    <?php $query = "SELECT * FROM product_cat"; 
                                    $query_run = mysqli_query($conn, $query); ?>
                            <label for="category">Product Category :</label>
                           <select name="category" id="category" style="font-size:15px;">
                            <?php while ($row1 = mysqli_fetch_array($query_run)):;?>
                            <option><?php echo $row1[1]; ?></option>
                            <?php endwhile; ?>
                           </select>
                     </div>
                    <div class="form-group">
                            
                            <textarea id="desc" name="desc" rows="4" cols="68" placeholder="Input Product Description.."></textarea>           
                    </div>
               
                             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"onClick="window.location.reload();">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
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
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closedelete">
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
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes</button>
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
                        <h4>Product Details
                            <a href="function/addprod.php" class="btn btn-primary float-end">Add Product</a>

                           
                   
                        </h4>
                        </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped" id="datatableid">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                 
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Product Category</th>
                                    <th>Quantity</th>
                                    <th>Description</th>
                                    <th>Status</th>

                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM product";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $product)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $product['id']; ?></td>
                                                <td><?= $product['product_name']; ?></td>
                                                <td><?= $product['price']; ?></td>
                                                <td><?php echo '<img src="data:image;base64,'.base64_encode($product['image']).'" height="150" width="150">' ?></td>
                                                <td><?= $product['product_catn']; ?></td>
                                                <td><?= $product['Quantity']; ?></td>
                                                <td><?= $product['description']; ?></td>
                                                <td><?= $product['status']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success editbtn"> EDIT </button> &nbsp;
                                                    <BR>
                                                    <BR>
                                                    <button type="button" class="btn btn-danger deletebtn"> DELETE </button> &nbsp;
                                                    <BR>
                                                    <BR>
                                                   
                                                   
                                                   
                                                  
                                                </td>
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
                $('#pname').val(data[1]);
                $('#price').val(data[2]);
                $('#image').val(data[3]);
                $('#category').val(data[4]);
                $('#quan').val(data[5]);
                $('#desc').val(data[6]);
                $('#status').val(data[7]);
            });
        });

    </script>
    <script>
        $(document).ready(function () {

            $('.status').on('click', function () {

                $('#status').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

             
                $('#productn').val(data[1]);
             
            
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
    
<script>

$('#closemodal').click(function() {
    $('#editmodal').modal('hide');
});
$('#closestatus').click(function() {
    $('#status').modal('hide');
});
$('#closedelete').click(function() {
    $('#deletemodal').modal('hide');
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

