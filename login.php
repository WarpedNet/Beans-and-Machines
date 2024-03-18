<link rel="stylesheet" type="text/css" href="CSS/index.css">

<?php
 require "accounts.php";
 
?>

<html lang="en">
<div class="login-form"
<h2>Log In or Create Account</h2>
<form method="post" action="" name="login-form" class="data">
    <label for="userInput">Username:</label>
    <input name="Username"  id="userInput" placeholder="Enter username..." required autofocus>
    <label for="passInput">Password:</label>
    <input name="Password" id="passInput" placeholder="Enter Password" required>
    <button name="submit" value="login"  type="submit">Login</button>
    
    
</form>
</html>
<?php
include "accounts.php";
