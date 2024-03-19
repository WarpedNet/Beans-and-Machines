<?php
session_start();
//usernames & passwords? IDK I'll just use this as a test
//this will be used for sending account info to the database
//thank you to "login with sessions v4.pdf" for teaching me this
$user = $_POST['userInput'];
$pass = $_POST['passInput'];

//creating a query to check if the username + password is in the database
//$query = "SELECT * FROM logininfo where lPassword = '$pass' and lEmail = '$user'";
// this is a statement wow
//stmt = exec($query) or die();


if (isset($_POST['submit'])) {
    if (($_SESSION['userInput'] == $user) && ($_SESSION['passInput'] == $pass)) {
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
