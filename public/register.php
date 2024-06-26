<?php
    // sending registration data to database
    if (isset($_POST['submit'])){
        require_once "../src/validation.php";

        // if the username does not exist in the database
        if (!checkUsername($_POST['userInput'])) {
            if (passwordVerify($_POST["passInput"]) && verifyPhoneNumber($_POST["phoneNumInput"])) {
                require_once '../class/user/user.php';
                $usrObj = new user();
                $usrObj->setUsername($_POST["userInput"]);
                $usrObj->setPassword($_POST["passInput"]);
                $usrObj->setPhoneNum($_POST["phoneNumInput"]);
                $usrObj->setEmail($_POST["emailInput"]);
                $usrObj->setAdmin(false);
                $usrObj->sendToDatabase();

                // redirecting user to login once they have registered
                header("Location: login.php");
                exit();
            }
        }

        // showing a message if the username already exists in the database
        else {
            ?> 
            <div align="center">
                <h2 style="color: red;">(Username already exists.)</h2>
            </div>
            <?php
        }
    }
?>

<!-- requiring non login redirect version of header -->
<?php 
    require "../layout/headerWOLogin.php";
?>

<!-- displaying login popup -->
<link rel="stylesheet" type="text/css" href="../CSS/index.css">
<div class="login-form" align="center">
    <h2>Create Account</h2>
    <form method="post" name="login-form" class="data">
        <label for="userInput">Enter Username:</label>
        <input name="userInput" id="userInput" type="text" placeholder="Enter username..." required autofocus>
        <br>
        <label for="passInput">Password:</label>
        <input name="passInput" id="passInput" type="password" placeholder="Enter Password" required>
        <br>
        <label for="emailInput">Email:</label>
        <input name="emailInput" id="emailInput" type="email" placeholder="Enter Email Address" required>
        <br>
        <label for="phoneNumInput">Phone Number:</label>
        <input name="phoneNumInput" id="phoneNumInput" type="text" placeholder="+X-XXX-XXXX-XXXX" required>
        <br>
        <button name="submit" value="login" type="submit">Register</button>
    </form>
</div>
</body>

<?php
    // adding the footer to the page
    require '../layout/footer.php';
?>