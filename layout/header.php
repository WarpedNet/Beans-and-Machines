<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
/* Starts the session */
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
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
    <link rel="shortcut icon" href="../Images/Icons/favicon.ico">
    <title>Beans and Machines</title>
</head>
<body>
    <header>
        <span class="title-left">
            <!-- logo image -->
            <img src="../Images/ChangeMe.jpg", width=150vw>
            <strong>Beans and Machines</strong>
            <!-- only shows admin page as an option if the user is logged in as an admin -->
            <p class="title-links"><a href="index.php">Products</a> | <a href="aboutUs.php">About Us</a> | <a href="contact.php">Contact</a> <?php echo (isset($_SESSION["admin"]) && $_SESSION["admin"] ? " | <a href='admin.php'>Admin</a>" : null); ?></p>
        </span>
        <span class="title-right">
            <!-- cart button -->
            <div class="title-buttons">
                <button onclick="location.href='../public/cart.php'"><img src="../Images/Icons/cart.png", width=50vw></button>
                <!-- <a href="cart.php"><img src="../Images/Icons/cart.png", width=50vw></a> -->
                <p>Cart</p>
            </div>
            <!-- login button -->
            <div class="title-buttons">
                <!-- changes text of login button to "log out" if user is logged in -->
                <?php if (isset($_SESSION["Active"]) && $_SESSION["Active"] = true) { ?>
                    <button onclick="location.href='../public/logout.php'"><img src="../Images/Icons/login.png", width=50vw></button>
                    <p>Log Out</p>  

                    <?php } else { ?>
                         <button onclick="location.href='../public/login.php'"><img src="../Images/Icons/login.png", width=50vw></button> 
                         <p>Log In</p>
                         
                    <?php } ?>
            </div>
        </span>
    </header>
