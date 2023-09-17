
<?php
//include auth_session.php file on all user panel pages


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Supplier Create</title>
</head>
<body>

    <div class="container mt-5">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
       
                        <h4>Product Add 
                            <a href="../manufacturer/supplier.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="addprodd.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Supplier Name</label>
                                <input type="text" name="suppname" class="form-control"  required>
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>           
                            <div class="mb-3">
                                <label>Contact Number</label>
                                <input type="Text" name="Contact" class="form-control"   required>
                            </div>
                            <div class="mb-3">
                                <label>What kind of Supplier</label>
                                <input type="Text" name="suptt" class="form-control"   required>
                            </div>
                            

                            <div class="mb-3">
                                <button type="submit" name="savesupp" class="btn btn-primary">Add Supplier</button>
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