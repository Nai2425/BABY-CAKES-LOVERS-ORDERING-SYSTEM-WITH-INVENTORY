
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
    <link rel="stylesheet" type="text/css" href="../css/css2.css">
    <title>Product Ingredients</title>
</head>
<body>

    <div class="container mt-5">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
       
                        <h4>Add Ingredients 
                            <a href="../manufacturer/productup.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php if (isset($_GET['error'])) { ?>

<p class="error" ><?php echo $_GET['error']; ?></p>


<?php } ?>
<?php if (isset($_GET['oke'])) { ?>

<p class="oke"><?php echo $_GET['oke']; ?></p>


<?php } ?>
                        <form action="addprodd.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <?php $query = "SELECT * from product"; 
                                    $query_run = mysqli_query($conn, $query); ?>
                            <label for="prod">Select Product:</label>
                           <select name="prod" id="prod" style="font-size:18px;width:100%;" required>
                            <?php while($row = $query_run->fetch_assoc()) { echo '<option value="' . $row["id"] . '">' . $row["product_name"] . '</option>';} ?>
                           </select>
                      

                            </div>
                            <div class="mb-3">
                            <?php $query = "SELECT * from ingredients"; 
                                    $query_run = mysqli_query($conn, $query); ?>
                            <label for="ingre">Select Ingredient Name:</label>
                           <select name="ingre" id="mySelect" style="font-size:18px;width:100%;" required>
                            <?php while($row = $query_run->fetch_assoc()) { echo '<option value="' . $row["id"] . '">' . $row["ingredient_name"] . '</option>';} ?>
                           </select>
                      

                            </div>
                  
                      

                            </div>

                          




                            <div class="mb-3">
                           
                            <label for="quanigre" style="margin-left: 20px;">Input how many need For this Kind Of Product. It Depends on what you choose of ingredients.(Quantity / Grams / milliliter) </label>
                            <br>
                            <input type="number" id="myInputa"  value="0" name="quaningre" min="0" style="font-size:18px;width:97%;margin-left:13px"> 
                            <br>
                           
                            
                        </div>
                        
                        
                          
                            <div class="mb-3">
                                <button type="submit" name="savee" class="btn btn-primary">Save</button>
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
const mySelect = document.getElementById("mySelect");
const myInput = document.getElementById("myInput");

mySelect.addEventListener("change", function() {
  myInput.value = mySelect.value;
});
    </script>
</body>
</html>