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
	require_once "../class/user/user.php";
	require_once "../src/validation.php";

	$userObj = new user();
	$userArray = $userObj->getAllUsers();

	if (isset($_POST["submit"])) {
		$userObj->setUsername($_POST["userName"]);
		$userObj->setPassword($_POST["userPassword"]);
		$userObj->setEmail($_POST["userEmail"]);
		$userObj->setPhoneNum($_POST["userPhone"]);
		$userObj->setAdmin((isset($_POST["userAdmin"])) ? true : false);
		$userObj->sendToDatabase();
		header("Location: userEdit.php");
		exit();
	}

	if (isset($_GET["id"]) && preg_match("/\d/",$_GET["id"]) && $_GET["id"] >= 0) {
		$userObj->deleteUser($_GET["id"]);
		header("Location: userEdit.php");
		exit();
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
		<div>
			<h1 style="font-family:sans-serif;">Current Users</h1>
			<table>
				<tr>
					<th>User Name |</th>
					<th>User Password</th>
					<th>User Email |</th>
					<th>User Phone |</th>
					<th>Is User Admin |</th>
					<th>Edit User |</th>
					<th>Delete User</th>
				</tr>
				<tr>
					<td></td>
				</tr>
				<?php
				foreach ($userArray as $user) { ?>
					<tr>
						<td><?php echo $user["username"]; ?></td>
						<td><?php echo $user["password"]; ?></td>
						<td><?php echo ($user["email"]) ? $user["email"] : "N/A"; ?></td>
						<td><?php echo ($user["phoneNum"]) ? $user["phoneNum"] : "N/A"; ?></td>
						<td><?php echo ($user["isAdmin"]) ? "True" : "False"; ?></td>
						<td><a href="userEditSingle.php?id=<?php echo $user["userID"];?>">Edit User</a></td>
						<td><a href="userEdit.php?id=<?php echo $user["userID"];?>">Delete User</a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
		<div>
			<h1 style="font-family:sans-serif;">Add User</h1>
			<form method="POST">
				<label for="userName">User Name</label>
				<input type="text" name="userName" id="userName" required>
				<br>
				<label for="userPassword">User Password</label>
				<input type="text" name="userPassword" id="userPassword" required>
				<br>
				<label for="userEmail">User Email</label>
				<input type="email" name="userEmail" id="userEmail">
				<br>
				<label for="userPhone">User Phone</label>
				<input type="text" name="userPhone" id="userPhone">
				<br>
				<label for="userAdmin">Admin?</label>
				<input type="checkbox" name="userAdmin" id="userAdmin">
				<input type="submit" name="submit" value="Add User">
			</form>
		</div>
	</div>
</body>

<?php
	// adding the footer to the page
	require '../layout/footer.php';
?>