<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");









?>

<!DOCTYPE html>

<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['datee', '', 'Sales'],
      <?php
      require 'conn.php';
      $query = "select MONTHNAME(datee) as year,sum(price) as total from transaction group by year";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)) {
        echo "['" . $row["year"] . "', " . $row["total"] . ", " . $row["total"] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Company Total Sales Per Month',
      curveType: 'function',
      legend: {
        position: 'bottom'
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Product Name', 'Price'],
      <?php
      require 'conn.php';
      $query = "select TRIM(SUBSTRING_INDEX(product_name, '(', 1)) as product,sum(price) as total from transaction group by product";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($result)) {
        echo "['" . $row["product"] . "', " . $row["total"] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Most Sales Product',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>







<head>

  <title>HOME</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

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









  <style>

  </style>


  <div id="curve_chart" style="width: 85.5%; height: 300px;float:right;border-style:solid;border-color: green;" class="chart-div"></div>
  <br>
  <div id="donutchart" style="width: 85.5%; height: 300px;float:right;border-style:solid;border-color: green;" class="chart-div"></div>





















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>




  <script>
    $(document).ready(function() {
      $('#datatableid').DataTable();
    });
  </script>




  <script>
    function loadDoc() {


      setInterval(function() {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("noti_number").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "data.php", true);
        xhttp.send();

      }, 1000);


    }
    loadDoc();
  </script>

</body>

</html>