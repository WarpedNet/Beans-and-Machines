<?php
//usernames & passwords? idk i'll just use this as a test

$user = "callum";
$pass = "password";


if (isset($_POST['submit'])){
    if (($_POST['user'] == $user) && ($_POST['passInput'] == $pass)) {
        $_SESSION['pass'] = $user;
        header("Location: index.php");
        exit;
    }
    else
        echo 'Incorrect Username or Password';
}
