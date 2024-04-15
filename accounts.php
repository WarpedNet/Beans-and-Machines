<?php
session_start();
require "lib/CRUD Operations/readUserData.php";
//usernames & passwords will be stored
//to compare with the accounts in the database
if (isset($_POST['userInput']) && isset($_POST['passInput'])) {
    $user = $_POST['userInput'];
    $pass = $_POST['passInput'];

    //creating a query to check if the username + password is in the database
    $userquery = "SELECT * FROM users where uPassword = '$pass' and uEmail = '$user'";
    // $adminquery = "SELECT * FROM admin where isAdmin = 'true'";
    // this is a statement wow
    $readUserDataObj = new readUserData();
    $data = $readUserDataObj->displayUserData($userquery)[0];
    if (strlen($data[2])>0) {
        $user = true;
    }
    if (strlen($data[3]>0)) {
        $pass = true;
    }


    if (isset($_POST['submit'])) {
        if (($_SESSION['userInput'] == $user) && ($_SESSION['passInput'] == $pass) && (!$adminquery)) {
            $_SESSION['Username'] = $user;
            $_SESSION['Active'] = true;
            header("Location: index.php");
            exit;
        }
        elseif (($_SESSION['userInput'] == $user) && ($_SESSION['passInput'] == $pass) && ($adminquery)) {
            $_SESSION['Username'] =  $user;
            $_SESSION['Active'] = true;
            //header("Location: admin.php or whereever")
            exit;
            
        }
    }
}