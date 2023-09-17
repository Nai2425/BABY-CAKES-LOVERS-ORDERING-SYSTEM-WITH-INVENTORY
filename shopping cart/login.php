<?php
    require('../conn.php');
    session_start();

    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        // Check user is exist in the database
        $query    = "SELECT * FROM `account` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die($mysql_error());
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $_SESSION['username'] = $username;

            // Redirect to user dashboard page
            header("Location: products.php");
    if(isset($_POST['rememberMe'])){
        /**
         * Store Login Credential
         */
        setcookie('username', $_POST['username'], ( time() + ((365 * 24 * 60 * 60) *3) ));
        setcookie('password', $_POST['password'], ( time() + ((365 * 24 * 60 * 60) *3) ));
    }else{
        /**
         * Delete Login Credential
         */
        setcookie('username', $_POST['username'], ( time() - (24 * 60 * 60) ));
        setcookie('password', $_POST['password'], ( time() - (24 * 60 * 60) ));
    }
            exit();
        } 
        else {
            header("Location: loginn.php?error=Incorrect Username or Password");
            exit();
        }
    }
?> 
