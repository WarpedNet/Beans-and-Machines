<?php
session_start();
//usernames & passwords? IDK I'll just use this as a test
//this will be used for sending account info to the database
//thank you to "login with sessions v4.pdf" for teaching me this
$user = $_POST['userInput'];
$pass = $_POST['passInput'];

//creating a query to check if the username + password is in the database
$userquery = "SELECT * FROM logininfo where lPassword = '$pass' and lEmail = '$user'";
$adminquery = "SELECT * FROM admin where isAdmin = 'true'";
// this is a statement wow
$stmt = exec($userquery) && exec($adminquery) or die();


if (isset($_POST['submit'])) {
    if (($_SESSION['userInput'] == $user) && ($_SESSION['passInput'] == $pass) && (!$adminquery)) {
        $_SESSION['Username'] = $user;
        $_SESSION['Active'] = true;
        header("Location: index.php");
        exit;
    }
    elseif (($_SESSION['userInput'] == $user) && ($_SESSION['passInput'] == $pass) && ($adminquery)) {
        $_SESSION['Username'] =  $user;
        $_SESSION['Active'] = true;
        //header("Location: admin.php or whereever")
        exit;
        
    }
}
