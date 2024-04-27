<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["admin"]) == false || !$_SESSION['admin']){
	header("Location: login.php");
	exit;
}
?>

<?php
	if (isset($_GET["id"]) && preg_match("/\d/", $_GET["id"]) && $_GET["id"] >= 0) {
		require_once "../class/user/user.php";
		$userObj = new user();

		$userObj->getUserFromDatabaseByID($_GET["id"]);
	
		if (isset($_POST["submit"])) {
			require_once "../src/validation.php";
			if ($_POST["userName"] != null && checkUsername($_POST["userName"])) {
				$userObj->setUsername($_POST["userName"]);
			}
			if ($_POST["userPassword"] != null && passwordVerify($_POST["userPassword"])) {
				$userObj->setPassword($_POST["userPassword"]);
			}
			if ($_POST["userEmail"] != null) {
				$userObj->setEmail($_POST["userEmail"]);
			}
			if ($_POST["userPhone"] != null) {
				$userObj->setPhoneNum($_POST["userPhone"]);
			}
			if ($_POST["isAdmin"] != null && $_POST["isAdmin"] == "true") {
				$userObj->setAdmin(true);
			}
			elseif ($_POST["isAdmin"] != null && $_POST["isAdmin"] == "false") {
				$userObj->setAdmin(false);
			}
			$userObj->updateUser($_GET["id"]);
			header("Location: userEdit.php");
			exit();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
    <link rel="shortcut icon" href="../Images/Icons/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
	<link rel="stylesheet" type="text/css" href="../CSS/admin.css">
    <title>Beans and Machines</title>
</head>
<body>
    <header>
        <span class="title-left">
            <!-- logo image -->
            <img src="../Images/ChangeMe.jpg", width=150vw>
            <strong>Beans and Machines</strong>
            <p class="title-links"><a href="../public/index.php">Products</a> | <a href="aboutUs.php">About Us</a> | <a href="contact.php">Contact</a> <?php echo (isset($_SESSION["admin"]) && $_SESSION["admin"] ? " | <a href='admin.php'>Admin</a>" : null); ?></p>
        </span>
        <span class="title-right">
            <!-- cart button -->
            <div class="title-buttons">
                <button onclick="location.href='cart.php'"><img src="../Images/Icons/cart.png", width=50vw></button>
                <p>Cart</p>
            </div>
            <!-- login button -->
            <div class="title-buttons">
                <?php if (isset($_SESSION["Active"]) && $_SESSION["Active"] = true) { ?>
                    <button onclick="location.href='../public/logout.php'"><img src="../Images/Icons/login.png", width=50vw></button>
                    <p>Log Out</p>  

                    <?php } else { ?>
                         <button onclick="location.href='login.php'"><img src="../Images/Icons/login.png", width=50vw></button> 
                         <p>Log In</p>
                         
                    <?php } ?>
            </div>
        </span>
    </header>

	<div class="main-content" align="center">
		<h1 style="font-family:sans-serif;">Edit User</h1>
		<form method="POST">
				<label for="userName">User Name</label>
				<input type="text" name="userName" id="userName" placeholder="<?php echo $userObj->getUsername();?>">
				<br>
				<label for="userPassword">User Password</label>
				<input type="text" name="userPassword" id="userPassword" placeholder="<?php echo $userObj->getPassword();?>">
				<br>
				<label for="userEmail">User Email</label>
				<input type="email" name="userEmail" id="userEmail" placeholder="<?php echo $userObj->getEmail();?>">
				<br>
				<label for="userPhone">User Phone</label>
				<input type="text" name="userPhone" id="userPhone" placeholder="<?php echo $userObj->getPhoneNum();?>">
				<br>
				<label for="true">Admin</label>
				<input type="radio" id="true" name="isAdmin" value="true" <?php echo ($userObj->isAdmin()) ? "checked" : null?>>
				<label for="false">Not Admin</label>
				<input type="radio" id="false" name="isAdmin" value="false" <?php echo (!$userObj->isAdmin()) ? "checked" : null?>>
				<button type="submit" name="submit" value="Update User">Update User</button>
		</form>
	</div>
</body>
