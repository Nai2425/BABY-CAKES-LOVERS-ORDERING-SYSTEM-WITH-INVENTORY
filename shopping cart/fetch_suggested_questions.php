
<?php 
@include '../conn.php';
    $select_cart = mysqli_query($conn, "SELECT * FROM `chatbot` order by  RAND() limit 3");
    $grand_total = 0;
    if(mysqli_num_rows($select_cart) > 0){
        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
?>
    <button id="suggestions" class="suggestions" onclick="updateInputBox(value)" value="<?php echo $fetch_cart['queries']; ?>"><?php echo $fetch_cart['queries']; ?></button>
<?php
        };
    };
?>
