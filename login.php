<!-- including css -->
<link rel="stylesheet" type="text/css" href="CSS/index.css">

<!-- setting the header at the top of the page -->
<?php
require_once 'src/DBconnect.php';
   // session_start();
   if (session_status() == PHP_SESSION_ACTIVE){
       header("location: index.php");
       exit;
   }
   
//method for logging in
//
$stmt = "SELECT username, password from users WHERE username = :username AND password = :password";
$query = $connection->prepare($stmt);
$query->bindParam(":username", $_POST['userInput'], PDO::PARAM_STR);
$query->bindParam(":password", $_POST['passInput'], PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);


 if ($result){
     //verifying password: https://www.php.net/manual/en/function.password-verify.php
     if (password_verify($_POST['passInput'],$result["password"])){
         $_SESSION['Active'] == true;
         $_SESSION['userInput'] = $_POST['userInput'];
         header("location: index.php");
     }
     else {
         echo "Incorrect Details.";
     }
 } 
 else{
     echo "Incorrect Details.";
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
    <div class="login-form">
        <h2>Log In or Create Account</h2>
        <form method="post" name="login-form" class="data">
            <label for="userInput">Enter Username:</label>
            <input name="userInput" id="userInput" type="text" placeholder="Enter username..." required autofocus>
            
            <label for="passInput">Password:</label>
            <input name="passInput" id="passInput" type="password" placeholder="Enter Password" required>
            <button name="submit" value="login" type="submit">Login</button>
        </form>
    </div>
</html>

