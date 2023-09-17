<?php 
require '../conn.php';


$sql = "SELECT * FROM notification where status = 'manufacturer'";
$result = $conn->query($sql);

echo  $result->num_rows;







?>