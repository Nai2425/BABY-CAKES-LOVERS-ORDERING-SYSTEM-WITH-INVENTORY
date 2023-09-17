<?php
session_start();
require '../conn.php';




if(isset($_POST['saveprod']))
{
    $prodname = mysqli_real_escape_string($conn, $_POST['productname']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $cate = mysqli_real_escape_string($conn, $_POST['category']);
    
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    
    // check if the product name already exists
    $check_query = "SELECT * FROM product WHERE product_name = '$prodname'";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
        header("Location:../productlist.php?error=Product name already exists");
        exit;
    }
 
    $query = "INSERT INTO product (product_name,price,image,product_catn,Quantity,status,description) VALUES ('$prodname','$price','$file','$cate','0','Not Available','$desc')";
  
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $in = mysqli_query($conn, "INSERT INTO notification(message,status,date) values ('The admin is added a new product please update the ingredients of the $prodname','manufacturer',NOW()) ") or die('query failed');
          
        header("Location: ../productlist.php?oke=Successfully Created");
    }
    else
    {
        header("Location: addprodd.php?error=Some Information is Incorrect");
    }
}


if(isset($_POST['updatedata']))
{   
    $id = $_POST['update_id'];
    
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $categ = $_POST['category'];
 
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    if(isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])){
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "UPDATE product SET product_name ='$pname', price='$price', image = '$file', product_catn = '$categ', description = '$desc' WHERE id='$id'";
    } else {
        $query = "UPDATE product SET product_name ='$pname', price='$price', product_catn = '$categ', description = '$desc' WHERE id='$id'";
    }
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../productlist.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../productlist.php?error=Unsuccessfully Update");
    }
}

   
    


    if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM product WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../productlist.php?oke=Successfully Deleted");
    }
    else
    {
        header("Location: ../productlist.php?error=Unsuccessfully Created");
    }
}

if(isset($_POST['deletedataa']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM transaction WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../transaction.php?oke=Successfully Deleted");
    }
    else
    {
        header("Location: ../transaction.php?error=Unsuccessfully Created");
    }
}


//product category
if(isset($_POST['saveprodcat']))
{
    $prodcat = mysqli_real_escape_string($conn, $_POST['productcatn']);

   


    $query = "INSERT INTO product_cat (product_catn) VALUES ('$prodcat')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        header("Location: ../productcat.php?oke=Successfully Created");
    }
    else
    {
        header("Location: addprodcat.php?error=Some Information is Incorrect");
    }
}

if(isset($_POST['deletedatacat']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM product_cat WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../productcat.php?oke=Successfully Deleted");
    }
    else
    {
        header("Location: ../productcat.php?error=Unsuccessfully Created");
    }
}
if(isset($_POST['updatedatacat']))
{   
    $id = $_POST['update_id'];
    
    $cat = $_POST['pname'];

    $query = "UPDATE product_cat SET product_catn ='$cat' WHERE id='$id'  ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../productcat.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../productcat.php?ok=error Update");
    }
}

// ingredients

if(isset($_POST['saveingre']) && isset($_POST['measurement']) && $_POST['measurement'] == 'Quantity')
{
 
    
    
    
    $ingrename = mysqli_real_escape_string($conn, $_POST['ing_name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);   
    $supp = mysqli_real_escape_string($conn, $_POST['Supplier']);
    $meas = mysqli_real_escape_string($conn, $_POST['measurement']);
        
            $query = "INSERT INTO ingredients (ingredient_name,quantity,supplier,measurement,converter) VALUES ('$ingrename','$quantity','$supp','$meas', 0)";

    $query_run = mysqli_query($conn, $query);
   
    

    if($query_run )
    {
       
            
        
       

        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Created");
  
        
    }
    else
    {
        header("Location:../manufacturer/Ingredients.php?error=Some Information is Incorrect");
    }
        

   

 
   


    
}
//converter grams
if(isset($_POST['saveingre']) && isset($_POST['measurement']) && $_POST['measurement'] == 'Grams')
{
 
    
    
    
    $ingrename = mysqli_real_escape_string($conn, $_POST['ing_name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);   
    $supp = mysqli_real_escape_string($conn, $_POST['Supplier']);
    $meas = mysqli_real_escape_string($conn, $_POST['measurement']);
    $convertedQuantity = $quantity / 1000;
            $query = "INSERT INTO ingredients (ingredient_name,quantity,supplier,measurement,converter) VALUES ('$ingrename','$quantity','$supp','$meas', '$convertedQuantity')";

    $query_run = mysqli_query($conn, $query);
  

    if($query_run)
    {

       

        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Created");
  
        
    }
    else
    {
        header("Location:../manufacturer/Ingredients.php?error=Some Information is Incorrect");
    }
        

   

 
   


    
}
//converter mililiter
if(isset($_POST['saveingre']) && isset($_POST['measurement']) && $_POST['measurement'] == 'Mililiter')
{
 
    
    
    
    $ingrename = mysqli_real_escape_string($conn, $_POST['ing_name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);   
    $supp = mysqli_real_escape_string($conn, $_POST['Supplier']);
    $meas = mysqli_real_escape_string($conn, $_POST['measurement']);
    $convertedQuantity = $quantity / 1000;
    $density = 1; // Example density in kg/ml for water (at 20 degrees Celsius)
$massInKilograms = $convertedQuantity * $density;

            $query = "INSERT INTO ingredients (ingredient_name,quantity,supplier,measurement,converter) VALUES ('$ingrename','$quantity','$supp','$meas', '$massInKilograms')";

    $query_run = mysqli_query($conn, $query);
  

    if($query_run)
    {

       

        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Created");
  
        
    }
    else
    {
        header("Location:../manufacturer/Ingredients.php?error=Some Information is Incorrect");
    }
        

   

 
   


    
}





if(isset($_POST['savee']))
{
    $prod =  mysqli_real_escape_string($conn, $_POST['prod']);
    $quann =  mysqli_real_escape_string($conn, $_POST['ingre']); 
    $supp = mysqli_real_escape_string($conn, $_POST['quaningre']);

        
    $query = "INSERT INTO prod_ingre (product_id,ingredient_id,quantity) VALUES ('$prod','$quann','$supp')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        header("Location: ../manufacturer/productup.php?oke=Successfully Inserted the Ingredients into the Product You can still add another ingredient for the same product");
    }
    else
    {
        header("Location:../manufacturer/productup.php?error=Unsuccessfully Created");
    }


    
}


if(isset($_POST['deleteingre']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM ingredients WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Deleted");
    }
    else
    {
        header("Location: ../manufacturer/Ingredients.php?error=Unsuccessfully Created");
    }
}
if(isset($_POST['updateingre']))
{   
    $id = $_POST['update_id'];
    $tname = $_POST['tname'];
    $measurement = $_POST['measurement'];

    $supp = mysqli_real_escape_string($conn, $_POST['Supplier']);
    
    if(isset($_POST['measurement']) && $_POST['measurement'] == 'Quantity')
{
    $query = "UPDATE ingredients SET ingredient_name ='$tname', supplier = '$supp', measurement = '$measurement', converter = 0 WHERE id='$id'  ";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
       
        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../manufacturer/Ingredients.php?ok=error Update");
    }
}elseif(isset($_POST['measurement']) && $_POST['measurement'] == 'Grams'){
    $query = "UPDATE ingredients SET ingredient_name = '$tname', supplier = '$supp', measurement = '$measurement', converter = quantity / 1000 WHERE id = '$id'";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
       
        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../manufacturer/Ingredients.php?ok=error Update");
    }
}elseif(isset($_POST['measurement']) && $_POST['measurement'] == 'Mililiter'){
    $query = "UPDATE ingredients SET ingredient_name = '$tname', supplier = '$supp', measurement = '$measurement', converter = (quantity / 1000) * 1 WHERE id = '$id'";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
       
        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../manufacturer/Ingredients.php?ok=error Update");
    }
}
   

   
}

if(isset($_POST['updateingret']))
{   
    $tname = $_POST['tname'];
    $quan = $_POST['quan'];
    $mea = $_POST['mea'];
    if(isset($_POST['mea']) && $_POST['mea'] == 'Quantity')
{
    $query = "UPDATE ingredients SET quantity = quantity + $quan WHERE ingredient_name='$tname'";
    $query_run = mysqli_query($conn, $query);
    
    $sqlaaa = "SELECT ingredient_name,quantity,measurement FROM ingredients WHERE ingredient_name = '$tname'";
    $resultaaa = mysqli_query($conn, $sqlaaa); 
    while ($rowa = mysqli_fetch_assoc($resultaaa)){
        $name = $rowa["ingredient_name"];
        $names = $rowa["quantity"];
        $namess = $rowa["measurement"];
        
        $sqr = "INSERT INTO transacing (ingredients,date,totaldeduct,totalremain,totaladd,measurement) values ('$name',CURRENT_TIMESTAMP(),'0','$names','$quan','$namess')";
        $resultr = mysqli_query($conn, $sqr); 
    }

 

    if($query_run)
    {
        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../manufacturer/Ingredients.php?ok=error Update");
    }
}elseif(isset($_POST['mea']) && $_POST['mea'] == 'Grams')
{

    $query = "UPDATE ingredients SET quantity = quantity + $quan , converter = quantity / 1000  WHERE ingredient_name='$tname'";
    $query_run = mysqli_query($conn, $query);
    
    $sqlaaa = "SELECT ingredient_name,quantity,measurement FROM ingredients WHERE ingredient_name = '$tname'";
    $resultaaa = mysqli_query($conn, $sqlaaa); 
    while ($rowa = mysqli_fetch_assoc($resultaaa)){
        $name = $rowa["ingredient_name"];
        $names = $rowa["quantity"];
        $namess = $rowa["measurement"];
        
        $sqr = "INSERT INTO transacing (ingredients,date,totaldeduct,totalremain,totaladd,measurement) values ('$name',CURRENT_TIMESTAMP(),'0','$names','$quan','$namess')";
        $resultr = mysqli_query($conn, $sqr); 
    }

 

    if($query_run)
    {
        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../manufacturer/Ingredients.php?ok=error Update");
    }
}elseif(isset($_POST['mea']) && $_POST['mea'] == 'Mililiter')
{

    $query = "UPDATE ingredients SET quantity = quantity + $quan , converter = (quantity / 1000) * 1  WHERE ingredient_name='$tname'";
    $query_run = mysqli_query($conn, $query);
    
    $sqlaaa = "SELECT ingredient_name,quantity,measurement FROM ingredients WHERE ingredient_name = '$tname'";
    $resultaaa = mysqli_query($conn, $sqlaaa); 
    while ($rowa = mysqli_fetch_assoc($resultaaa)){
        $name = $rowa["ingredient_name"];
        $names = $rowa["quantity"];
        $namess = $rowa["measurement"];
        
        $sqr = "INSERT INTO transacing (ingredients,date,totaldeduct,totalremain,totaladd,measurement) values ('$name',CURRENT_TIMESTAMP(),'0','$names','$quan','$namess')";
        $resultr = mysqli_query($conn, $sqr); 
    }

 

    if($query_run)
    {
        header("Location: ../manufacturer/Ingredients.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../manufacturer/Ingredients.php?ok=error Update");
    }
}
   
    
}


//status

//reservation
if(isset($_POST['deleteres']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM reservation WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../reservation.php?oke=Successfully Deleted");
    }
    else
    {
        header("Location: ../productcat.php?error=Unsuccessfully Created");
    }
}
//chatbot
if(isset($_POST['saveconvo']))
{
    $inqu = mysqli_real_escape_string($conn, $_POST['question']);
    $reply = mysqli_real_escape_string($conn, $_POST['reply']);
 
    
   


    $query = "INSERT INTO chatbot (queries,replies) VALUES ('$inqu','$reply')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        header("Location: ../chatbot.php?oke=Successfully Created");
    }
    else
    {
        header("Location: chatbot.php?error=Some Information is Incorrect");
    }
}
if(isset($_POST['updateconvo']))
{   
    $id = $_POST['update_id'];
    
    $ques = $_POST['question'];
    $reply = $_POST['reply'];

    $query = "UPDATE chatbot SET queries ='$ques', replies = '$reply' where id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../chatbot.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../chatbot.php?ok=error Update");
    }
}
if(isset($_POST['deleteconvo']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM chatbot WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../chatbot.php?oke=Successfully Deleted");
    }
    else
    {
        header("Location: ../chatbot.php?error=Unsuccessfully Created");
    }
}
//update reservation
if(isset($_POST['updateres'])) {
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $total = mysqli_real_escape_string($conn, $_POST['quan']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $us = mysqli_real_escape_string($conn, $_POST['user']);
    $id = $_POST['update_id'];

    // Check if product quantity is negative or zero
  
 
// Check if product quantities are negative or zero
$quantity_query = mysqli_query($conn, "SELECT product_name, quantity FROM `product` WHERE product_name IN (SELECT productname FROM `reservation` WHERE username='$us')");
$quantity_results = mysqli_fetch_all($quantity_query, MYSQLI_ASSOC);

foreach ($quantity_results as $quantity_result) {
    $prodname = $quantity_result['product_name'];
    $quantity = $quantity_result['quantity'];
    $cart_quantity_query = mysqli_query($conn, "SELECT quantity FROM `reservation` WHERE username='$us' AND productname='$prodname' AND status = 'Ready to pick up'");
    if ($cart_quantity_query) {
        $cart_quantity_result = mysqli_fetch_assoc($cart_quantity_query);
        if ($cart_quantity_result) {
            $cart_quantity = $cart_quantity_result['quantity'];
            if ($quantity < $cart_quantity) {
                header("Location: ../reservation.php?error= the $prodname in this reservation has a quantity of zero or will become negative. You must update the product first");
                exit();
            }
        } else {
            // handle the case where no rows were returned
        }
    } else {
        // handle the case where the query failed
    }
}


   

$cart_query = mysqli_query($conn, "SELECT * FROM `reservation` WHERE username='$us' AND status = 'Ready to pick up'");
$price_total = 0;
if(mysqli_num_rows($cart_query) > 0){
    while($product_item = mysqli_fetch_assoc($cart_query)){
        $prodname = $product_item['productname'];
        $quan = $product_item['quantity'];
        $pricee = $product_item['producttotal'];

        $detail_query = mysqli_query($conn, "UPDATE product SET quantity = quantity - '$quan' WHERE product_name ='$prodname' ") or die('query failed');

        $query = "INSERT INTO transaction (product_name,price,customer_fname,customer_lname,datee) VALUES ('$prodname','$pricee','$fname','$lname',CURRENT_TIMESTAMP())";
        $query_run = mysqli_query($conn, $query);

        if(!$query_run)
        {
            header("Location: reservation.php?error=Some Unsuccessfully paid");
            exit();
        }
    }

    // Update the status of all reservation items to Paid
    $query = mysqli_query($conn,"UPDATE reservation SET status = 'Claimed' WHERE username = '$us' AND status = 'Ready to pick up'") or die('query failed');

    if($query)
    {
        header("Location: ../transaction.php?oke=Successfully Paid");
    }
    else
    {
        header("Location: reservation.php?error=Some Unsuccessfully paid");
    }
}

}


//supplier 
if(isset($_POST['savesupp']))
{
    $suppname = mysqli_real_escape_string($conn, $_POST['suppname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $Contact = mysqli_real_escape_string($conn, $_POST['Contact']);
    $suptt = mysqli_real_escape_string($conn, $_POST['suptt']);
   
   


    $query = "INSERT INTO supplier (name,address,contact,type) VALUES ('$suppname','$address','$Contact','$suptt')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        header("Location: ../manufacturer/supplier.php?oke=Successfully Created");
    }
    else
    {
        header("Location: ../manufacturer/supplier.php?error=Some Information is Incorrect");
    }
}
if(isset($_POST['updatesup']))
{
    $suppname = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $Contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $id = $_POST['update_id'];
   


    
    $query = "UPDATE supplier SET name ='$suppname', address = '$address', contact = '$Contact' where id='$id'";
        $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
      
        header("Location: ../manufacturer/supplier.php?oke=Successfully Update");
        
    }
    else
    {
        header("Location: ../manufacturer/supplier.php?error=Some Unsuccessfully paid");
    }
}
if(isset($_POST['deletesup']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM supplier WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../manufacturer/supplier.php?oke=Successfully Deleted");
    }
    else
    {
        header("Location: ../manufacturer/supplier.php?error=Unsuccessfully Created");
    }
}
//productup

if(isset($_POST['updatepro']))
{   
    $id = $_POST['update_id'];
    
    $pro = mysqli_real_escape_string($conn, $_POST['prod_name']);
    $ing = mysqli_real_escape_string($conn, $_POST['ing_name']);
    $qua = mysqli_real_escape_string($conn, $_POST['quan']);

    $query = "UPDATE prod_ingre SET productname = '$pro', ingredient = '$ing', quantity = '$qua' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../manufacturer/productup.php?oke=Successfully Update");
    }
    else
    {
        header("Location: ../manufacturer/productup.php?ok=error Update");
    }
}
if(isset($_POST['deletepro']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM prod_ingre WHERE product_id='$id'";
    $query_run = mysqli_query($conn, $query);



    if($query_run)
    {
        header("Location: ../manufacturer/productup.php?oke=Successfully Deleted");
    }
    else
    {
        header("Location: ../manufacturer/productup.php?error=Unsuccessfully Created");
    }
}


//dagdag

if(isset($_POST['saveee']))
{   

    $product_id = mysqli_real_escape_string($conn, $_POST['prod']);
$quantity = mysqli_real_escape_string($conn, $_POST['quaningre']);

// check if the input quantity is valid
$sql = "SELECT ingredient_id, quantity FROM prod_ingre WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);
$invalid_quantity = false;

while ($row = mysqli_fetch_assoc($result)) {
    $ingredient_id = $row["ingredient_id"];
    $ingredient_quantity = $row["quantity"] * $quantity;
    
    // check if the ingredient quantity will become negative
    $sel = mysqli_query($conn, "SELECT quantity FROM ingredients WHERE id = $ingredient_id");
    $ingredient_row = mysqli_fetch_assoc($sel);
    $available_quantity = $ingredient_row['quantity'];
    
    if (($available_quantity - $ingredient_quantity) < 0) {
        $invalid_quantity = true;
        break;
    }
}

if ($invalid_quantity) {
    // redirect with error message
    header("Location: ../manufacturer/productup.php?error=The quantity of the product that you have input will result in a negative quantity of ingredients. You need to contact the manufacturer of the ingredient and ask for delivery before you can update the product again.");
} else {
    // update the ingredient quantities and product quantity in the database

    
    $sql = "SELECT ingredient_id, quantity FROM prod_ingre WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $ingredient_id = $row["ingredient_id"];
        $ingredient_quantity = $row["quantity"] * $quantity;

        $update_sql = "UPDATE ingredients SET quantity = quantity - $ingredient_quantity WHERE id = $ingredient_id AND measurement ='Quantity'";
       $wew = mysqli_query($conn, $update_sql);
       $update_sqla = "UPDATE ingredients SET quantity = quantity - $ingredient_quantity, converter = quantity / 1000 WHERE id = $ingredient_id AND measurement ='Grams'";
       $wewa = mysqli_query($conn, $update_sqla);
       $update_sqla = "UPDATE ingredients SET quantity = quantity - $ingredient_quantity, converter = (quantity / 1000) * 1 WHERE id = $ingredient_id AND measurement ='Mililiter'";
       $wewa = mysqli_query($conn, $update_sqla);
     
        $sqlaaa = "SELECT ingredient_name,quantity,measurement FROM ingredients WHERE id = $ingredient_id";
        $resultaaa = mysqli_query($conn, $sqlaaa);
    while ($rowa = mysqli_fetch_assoc($resultaaa)){
        $name = $rowa["ingredient_name"];
        $names = $rowa["quantity"];
        $namess = $rowa["measurement"];
        $sqr = "INSERT INTO transacing (ingredients,date,totaldeduct,totalremain,totaladd,measurement) values ('$name',CURRENT_TIMESTAMP(),'$ingredient_quantity','$names','0','$namess')";
        $resultr = mysqli_query($conn, $sqr);  
    }
     
    }

    
    $update_sqla = "UPDATE product SET quantity = quantity + $quantity, status ='Available' WHERE id = $product_id;";
    mysqli_query($conn, $update_sqla);
    
   
   
    // redirect with success message
    header("Location: ../manufacturer/productup.php?oke=Successfully Update");
}

}
//notification

//carta

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}
if(isset($_POST['cancelres']))
{
    $id =  $_POST['update_id'];


    $sql = "SELECT * FROM reservation WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $productnames = $row["productname"];
        $quantiti = $row["quantity"];

        $queryap = "UPDATE product SET Quantity = Quantity + $quantiti, status = 'Available' WHERE product_name = '$productnames'";
        $query_runap = mysqli_query($conn, $queryap);
        $query = "UPDATE reservation SET status ='Cancelled by user' WHERE id = '$id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run && $query_runap)
        {
           
            header("Location: ../shopping cart/prev.php?oke=Successfully cancel your reservation");
            exit();
        }
        else
        {
            header("Location: ../shopping cart/prev.php?ok=error");
             exit();
        }
    }

   

    
}
if (isset($_POST['upstat']) && isset($_POST['statusa']) && $_POST['statusa'] == 'Ready to pick up') {
    $id = mysqli_real_escape_string($conn, $_POST['stat_id']);
    $pnamee = mysqli_real_escape_string($conn, $_POST['pnamee']);
    $userr = mysqli_real_escape_string($conn, $_POST['userr']);
    $quannn = mysqli_real_escape_string($conn, $_POST['quann']);
    $status = mysqli_real_escape_string($conn, $_POST['statusa']);

    $query = "SELECT Quantity from product WHERE product_name = '$pnamee'";
    $query_run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($query_run);
    $pquantity = $row["Quantity"];
    $total = $pquantity - $quannn;
    
    if ($total < 0) {
        header("Location: ../reservation.php?error=the product that you choose will be negative. you can add the quantity of  $pnamee");
    } else {
     
       $query = "UPDATE reservation SET status ='$status' WHERE id = '$id'";
       $query_run = mysqli_query($conn, $query);

       if($query_run)
       {
           header("Location: ../reservation.php?oke=Successfully Change the status");
           exit();
       }
       else
       {
           header("Location: ../shopping cart/prev.php?ok=error");
           exit();
       }
    }
}


if(isset($_POST['upstat']) && isset($_POST['statusa']) && $_POST['statusa'] == 'Preparing' )
{
    $id = mysqli_real_escape_string($conn, $_POST['stat_id']);
    $pnamee = mysqli_real_escape_string($conn, $_POST['pnamee']);
    $userr = mysqli_real_escape_string($conn, $_POST['userr']);
    $quannn = mysqli_real_escape_string($conn, $_POST['quann']);
   $status = mysqli_real_escape_string($conn, $_POST['statusa']);

   $query = "UPDATE reservation SET status ='$status' WHERE id = '$id'";
   $query_run = mysqli_query($conn, $query);

   if($query_run)
   {
       header("Location: ../reservation.php?oke=Successfully Change the status");
       exit();
   }
   else
   {
       header("Location: ../shopping cart/prev.php?ok=error");
        exit();
   }
  


        
    }
     








if(isset($_POST['deletewow']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM reservation WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);



    if($query_run)
    {
        header("Location: ../shopping cart/prev.php?oke=Successfully Deleted");
    }
    else
    {
        header("Location: ../shopping cart/prev.php?error=Unsuccessfully Created");
    }
}
if(isset($_POST['addstar']))
{
    $id = $_POST['tfid'];
    $prodact = $_POST['pradact'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $queryw = "select * from reservation where id = '$id'";
    $query_runw = mysqli_query($conn, $queryw);
    $fetch_producta = mysqli_fetch_assoc($query_runw);
    $user = $fetch_producta['username'];
     


    $query = "INSERT INTO rate (productname,star,comment,username,date) values ('$prodact','$rating','$comment','$user',CURRENT_TIMESTAMP())";
    $query_run = mysqli_query($conn, $query);
    $querya = "update reservation set rated = 1 where id = '$id'";
    $query_runa = mysqli_query($conn, $querya);

    if($query_run && $query_runa)
    {
       
        header("Location: ../shopping cart/prev.php?oke=Successfully Rate");
    }
    else
    {
        header("Location: ../shopping cart/prev.php?error=Unsuccessfully Rate");
    }
}

?>