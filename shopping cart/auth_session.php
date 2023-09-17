<?php
require '../conn.php';
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }

    $sql = "SELECT * FROM reservation WHERE CURDATE() > dateofpickup AND status = 'Ready to pick up'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
       

        $queryap = "UPDATE reservation SET  status = 'Void' WHERE id = '$id'";
        $query_runap = mysqli_query($conn, $queryap);
        $sqla = "SELECT * FROM reservation WHERE id = $id";
    $resulta = mysqli_query($conn, $sqla);
    while ($row = mysqli_fetch_assoc($resulta)) {
        $productnames = $row["productname"];
        $quantiti = $row["quantity"];

        $queryap = "UPDATE product SET Quantity = Quantity + $quantiti, status = 'Available' WHERE product_name = '$productnames'";
        $query_runap = mysqli_query($conn, $queryap);
        
    }
    }
?>