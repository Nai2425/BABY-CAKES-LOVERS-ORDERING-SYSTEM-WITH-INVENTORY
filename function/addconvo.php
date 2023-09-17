
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

    <title>Conversation Create</title>
</head>
<body>

    <div class="container mt-5">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
       
                        <h4> Add Conversation
                            <a href="../chatbot.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="addprodd.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>User Inquires</label>
                                <input type="text" name="question" class="form-control"  required>
                            </div>
                            <div class="mb-3">
                                <label>Reply</label>
                                <input type="text" name="reply" class="form-control" required>
                            </div>
                            
                           


                            <div class="mb-3">
                                <button type="submit" name="saveconvo" class="btn btn-primary">Add Conversation</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>