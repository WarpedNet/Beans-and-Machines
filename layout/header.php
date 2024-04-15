<?php
if (session_status() == PHP_SESSION_NONE){
    session_start(); /* Starts the session */ 
}
if($_SESSION['Active'] == false){ /* Redirects user to login.php if not logged in */
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
    <link rel="shortcut icon" href="Images/Icons/favicon.ico">
    <title>Beans and Machines</title>
</head>
<body>
    <header>
        <span class="title-left">
            <!-- logo image -->
            <img src="Images/ChangeMe.jpg", width=150vw>
            <strong>Beans and Machines</strong>
            <p class="title-links"><a href="index.php">Products</a> | <a href="aboutUs.php">About Us</a> | <a href="contact.php">Contact</a> <?php echo (isset($_SESSION["admin"]) && $_SESSION["admin"] ? " | <a href='admin.php'>Admin</a>" : null); ?></p>
        </span>
        <span class="title-right">
            <!-- cart button -->
            <div class="title-buttons">
                <a href="cart.php"><img src="Images/Icons/cart.png", width=50vw></a>
                <p>Cart</p>
            </div>
            <!-- login button -->
            <div class="title-buttons">
                
                <a href="login.php"><img src="Images/Icons/login.png", width=50vw></a>
                <p>Log In</p>
            </div>
        </span>
    </header>
