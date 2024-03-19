<?php
session_start();
//usernames & passwords? IDK I'll just use this as a test
//this will be used for sending account info to the database
//thank you to "login with sessions v4.pdf" for teaching me this
$user = "callum";
$pass = "password";

if (isset($_POST['submit'])) {
    if (($_POST['userInput'] == $user) && ($_POST['passInput'] == $pass)) {
        $_SESSION['Username'] = $user;
        $_SESSION['Active'] = true;
        header("Location: index.php");
        exit;
    }
    else {
        echo "Incorrect Username or Password";
        header("Location: login.php");
        
    }
}
