<link rel="stylesheet" type="text/css" href="CSS/index.css">

<?php
session_start();
require 'layout/header.php';
include 'accounts.php';
 
?>

<html lang="en">
<div class="login-form"
<h2>Log In or Create Account</h2>
<form method="post"  name="login-form" class="data">
    <label for="userInput">Username:</label>
    <input name="user"  id="userInput"  placeholder="Enter username..." required autofocus>
    
   
    <label for="passInput">Password:</label>
    <input name="passInput" id="passInput" type="password" placeholder="Enter Password" required>
    <button name="submit" value="login"  type="submit">Login</button>
    
    
</form>
</html>

