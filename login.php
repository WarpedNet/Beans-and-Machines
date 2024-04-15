<!-- including css -->
<link rel="stylesheet" type="text/css" href="CSS/index.css">

<!-- setting the header at the top of the page -->
<?php
    require 'layout/header.php';
    include 'accounts.php';
   //require (filepath to create file)
?>

<!-- I'm going to leave the method to register here -->
<?php 
if (isset($_POST['submit'])){
    try {
        require_once 'src/DBconnect.php';
        require 'src/common.php';
        
        $new_user = array(
                "username" => escape($_POST['userInput']),
                "password" => escape($_POST['passInput'])
        );
        $statement = sprintf("INSERT INTO %s (%s) values (%s)","logininfo",
        implode(", ", array_keys($new_user)),
        ":" . implode(", :",array_keys($new_user)));
        $prepared = $connection->prepare($statement);
        $prepared->execute($new_user);
        
    }
    catch (PDOException $e){
        echo $statement . "<br>" . $e->getMessage();
    }
}
// this if statement should check if the account exists, kinda
if (isset($_POST['submit']) && $statement){
    echo 'Welcome '. $new_user['username'];
}

?>

<!-- displaying login popup -->
<html lang="en">
    <div class="login-form">
        <h2>Log In or Create Account</h2>
        <form method="post" name="login-form" class="data">
            <label for="userInput">Enter Username:</label>
            <input name="userInput" id="userInput" type="text" placeholder="Enter username..." required autofocus>
            
            <label for="passInput">Password:</label>
            <input name="passInput" id="passInput" type="password" placeholder="Enter Password" required>
            <button name="submit" value="login" type="submit">Login</button>
        </form>
    </div>
</html>

