<!-- Including Header -->
<?php require "../layout/headerWOLogin.php" ?>


<!-- setting the header at the top of the page -->
<?php
   // session_start();
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

   
//method for logging in
//
if (isset($_POST["submit"])) {
    require_once '../class/user/user.php';
    $usrObj = new user();
    if ($usrObj->getUserFromDatabase($_POST['userInput'], $_POST['passInput'])) {
        $_SESSION["Active"] = true;
        $_SESSION['Username'] = $usrObj->getUsername();

        if ($usrObj->isAdmin()) {
            $_SESSION["admin"] = true;
        }

        header("location: index.php");
    }
    else {
        echo "Cannot find username or password.";
    }

}
?>

<!-- displaying login popup -->
<link rel="stylesheet" type="text/css" href="../CSS/index.css">
    <div class="login-form" align="center">
        <h2>Log In or Create Account</h2>
        <form method="post" name="login-form" class="data">
            <label for="userInput">Enter Username:</label>
            <input name="userInput" id="userInput" type="text" placeholder="Enter username..." required autofocus>
            <br>  
            <label for="passInput">Password:</label>
            <input name="passInput" id="passInput" type="password" placeholder="Enter Password" required>
            <br>
            <button name="submit" value="login" type="submit">Login</button>
            <button name="register" value="register" onclick="location.href='register.php'">Register</button>
        </form>
    </div>
</body>

<?php
    // adding the footer to the page
    require '../layout/footer.php';
?>