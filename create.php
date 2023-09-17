<?php
    require('conn.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $firstname = stripslashes($_REQUEST['firstname']);
        $firstname = mysqli_real_escape_string($conn, $firstname);
        $lastname = stripslashes($_REQUEST['lastname']);
        $lastname = mysqli_real_escape_string($conn, $lastname);
        
        $query    = "INSERT into `users` (username, password, email,firstname, lastname)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$firstname', '$lastname')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            header("Location: index.php?ok=Successfully Created");
        } else {
            header("Location: createe.php?error=Some Information is Incorrect");
        }
    } 
?>