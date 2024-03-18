<?php
//usernames & passwords? idk i'll just use this as a test

$user = "callum";
$pass = "password";


if (isset($_POST['submit'])) {
  
    if (($_POST['userInput'] == $user) && ($_POST['passInput'] == $pass)) {
        header("Location: index.php");
        $_SESSION['pass'] = $user;
        exit;
    }
}
