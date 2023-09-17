<?php 
require 'conn.php';


$sql = "SELECT * FROM notification where status = 'admin'";
$result = $conn->query($sql);

echo  $result->num_rows;







?>