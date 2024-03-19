<!-- including css -->
<link rel="stylesheet" type="text/css" href="CSS/index.css">

<!-- setting the header at the top of the page -->
<?php
    require 'layout/header.php';
    include 'accounts.php';
?>

<!-- displaying login popup -->
<html lang="en">
    <div class="login-form">
        <h2>Log In or Create Account</h2>
        <form method="post" name="login-form" class="data">
            <label for="userInput">Enter Email Address:</label>
            <input name="userInput" id="userInput" type="email" placeholder="Enter username..." required autofocus>
            
            <label for="passInput">Password:</label>
            <input name="passInput" id="passInput" type="password" placeholder="Enter Password" required>
            <button name="submit" value="login" type="submit">Login</button>
        </form>
    </div>
</html>

