<?php
require('conn.php');

// Start the session
session_start();

// When form submitted, check and create user session.
if (isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);    // removes backslashes
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    
    // Check user is exist in the database
    $query = "SELECT * FROM `users` WHERE username='$username'
              AND password='" . md5($password) . "' and permission = 1";
    $result = mysqli_query($conn, $query) or die($mysql_error());
    $rows = mysqli_num_rows($result);
    
    if ($rows == 1) {
        $_SESSION['username'] = $username;
        // Redirect to user dashboard page
        header("Location:home.php");
        exit();
    } elseif ($rows <> 1) {
        $querya = "SELECT * FROM `users` WHERE username='$username'
                   AND password='" . md5($password) . "' and permission = 2";
        $resulta = mysqli_query($conn, $querya) or die($mysql_error());
        $rowsa = mysqli_num_rows($resulta);

        if ($rowsa == 1) {
            $_SESSION['username'] = $username;
            // Redirect to manufacturer dashboard page
            header("Location: manufacturer/home.php");
            exit();
        } else {
            header("Location: index.php?error=The Username or Password is Incorrect");
            exit();
        }
    }
}
?>