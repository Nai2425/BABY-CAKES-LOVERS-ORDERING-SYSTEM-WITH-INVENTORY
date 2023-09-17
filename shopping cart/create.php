<?php
    require('../conn.php');
    // When form submitted, insert values into the database.




    if (isset($_REQUEST['username'])) {
        // Removes backslashes
        $username = stripslashes($_REQUEST['username']);
        // Escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $firstname = stripslashes($_REQUEST['firstname']);
        $firstname = mysqli_real_escape_string($conn, $firstname);
        $lastname = stripslashes($_REQUEST['lastname']);
        $lastname = mysqli_real_escape_string($conn, $lastname);
    
        $sql = "SELECT * FROM account WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
    
        $sqla = "SELECT * FROM account WHERE email = '$email'";
        $resulta = mysqli_query($conn, $sqla);
    
        // Check the query results
        if (mysqli_num_rows($result) > 0) {
            header("Location: createe.php?error=Sorry, this username is already taken.");
        } elseif (mysqli_num_rows($resulta) > 0) {
            header("Location: createe.php?error=Sorry, this Email is already taken.");
        } else {
            // Read the image file into a variable
            $imageData = file_get_contents('images/iconman.png'); // Replace with the actual path to your image file
    
            // Escape the image data
            $escapedImageData = mysqli_real_escape_string($conn, $imageData);
    
            $query = "INSERT into `account` (username, password, email, firstname, lastname, image)
            VALUES ('$username', '" . md5($password) . "', '$email', '$firstname', '$lastname', '$escapedImageData')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                header("Location: loginn.php?ok=Successfully Created");
            } else {
                header("Location: createe.php?error=Error. Please Try Again");
            }
        }
    }
    
?>