<?php
//usernames & passwords? idk i'll just use this as a test

$user = "callum";
$pass = "password";

if (isset($_POST['submit'])){
    header("Location: index.php");
}
else{
    header("Location: login.php");
}