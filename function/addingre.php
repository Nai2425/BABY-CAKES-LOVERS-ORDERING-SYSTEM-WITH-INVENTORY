
<?php
//include auth_session.php file on all user panel pages
include("../conn.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Product Ingredients</title>
</head>
<body>

    <div class="container mt-5">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
       
                        <h4>Add Ingredients 
                            <a href="../manufacturer/Ingredients.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="addprodd.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Ingredients Name</label>
                                <input type="text" name="ing_name" class="form-control"  required>
                            </div>
                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" required>
                            </div>
                            <div class="mb-3">
                           <?php $query = "SELECT * FROM supplier"; 
                                    $query_run = mysqli_query($conn, $query); ?>
                            <label for="Supplier">Supplier :</label>
                           <select name="Supplier" id="Supplier" style="font-size:18px;width:100%;" required>
                           
                            <?php while ($row1 = mysqli_fetch_array($query_run)):;?>
                            <option><?php echo $row1[1]; ?></option>
                            <?php endwhile; ?>
                           </select>
                            </div>
                            <div class="mb-3" style="font-size:18px;width:100%;">
                            <label for="measurement">Type of Measurement</label><br>
                        <select name="measurement" id="mySelect">
                            <option value="Quantity">Quantity</option>
                            <option value="Grams">Grams</option>
                            <option value="Mililiter">Milliliter</option>
                           
                        </select>
                        </div>
                     



                            <div class="mb-3">
                                <button type="submit" name="saveingre" class="btn btn-primary">Add Ingredients</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

</body>
</html>