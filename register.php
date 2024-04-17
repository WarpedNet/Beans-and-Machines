<!-- including css -->
<link rel="stylesheet" type="text/css" href="CSS/index.css">

<!-- setting the header at the top of the page -->
<?php
//require (filepath to create file)
?>

<!-- I'm going to leave the method to register here -->
<?php
if (isset($_POST['submit'])){
    try {
        require_once 'src/DBconnect.php';
        require 'src/common.php';

        $new_user = array(
            "username" => escape($_POST['userInput']),
            "password" => escape($_POST['passInput'])
        );
        $statement = sprintf("INSERT INTO %s (%s) values (%s)","users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :",array_keys($new_user)));
        $prepared = $connection->prepare($statement);
        $prepared->execute($new_user);

    }
    catch (PDOException $e){
        echo $statement . "<br>" . $e->getMessage();
    }
}
// this if statement should check if the account exists, kinda
if (isset($_POST['submit']) && $statement){

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

<!-- displaying login popup -->
<html lang="en">
<div class="login-form" align="center">
    <h2>Create Account</h2>
    <form method="post" name="login-form" class="data">
        <label for="userInput">Enter Username:</label>
        <input name="userInput" id="userInput" type="text" placeholder="Enter username..." required autofocus>
        <br>
        <label for="passInput">Password:</label>
        <input name="passInput" id="passInput" type="password" placeholder="Enter Password" required>
        <br>
        <button name="submit" value="login" type="submit">Register</button>
    </form>
</div>
</html>