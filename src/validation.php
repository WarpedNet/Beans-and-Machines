<?php
function checkUsername($username) {
    try {
        require_once '../src/DBconnect.php';

        $connection = DBconnect();
        $query = 'SELECT username FROM users WHERE username = :username';

        $stmt = $connection->prepare($query);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();

        // Boolval ref:
        // https://www.php.net/manual/en/function.boolval.php
        // Returns true if username exists, false if it doesnt
        return boolval($stmt->fetch(PDO::FETCH_ASSOC));
    }
    catch (PDOException $err) {
    	echo $query . "<br>" . $err->getMessage();
    }
}
// https://www.php.net/manual/en/function.preg-match.php
function passwordVerify($password){
    $numReg = '/\d/';
    $symbolReg = '/([-\'"()*,.:…;?#~$*<>,.&%£!¬`])/';
    $capitalReg = '/[A-Z]/';

    // using the nl2br() function: https://www.php.net/manual/en/function.nl2br.php
    // this is used to echo a break before newlines in the string.
    // no longer using this ^ using html instead

    // switch case for each password verification check
    switch($password) {
        // if the password is too long or too short
        case (strlen($password) < 5 || strlen($password) > 30):
            ?> 
            <div align="center">
                <h2 style="color: red;">(Password must be at least 5-30 characters long.)</h2>
            </div>
            <?php
            return false;
        // if the password does not contain a number
        case (!preg_match($numReg, $password)):
            ?> 
            <div align="center">
                <h2 style="color: red;">(Password must contain at least 1 number.)</h2>
            </div>
            <?php
            return false;
        // if the password is null
        case (null):
            ?> 
            <div align="center">
                <h2 style="color: red;">(Password cannot be null.)</h2>
            </div>
            <?php
            return false;
        // if the password does not contain a symbol
        case (!preg_match($symbolReg, $password)):
            ?> 
            <div align="center">
                <h2 style="color: red;">(Password must contain at least 1 special character.)</h2>
            </div>
            <?php
            return false;
        // if the password does not contain a capital
        case (!preg_match($capitalReg, $password)):
            ?> 
            <div align="center">
                <h2 style="color: red;">(Password must contain at least 1 capital character.)</h2>
            </div>
            <?php
            return false;
        // if the password meets all requirements
        default:
            return true;
    }
}

// Used to verify id's for $_GET vars
function verifyID($id) {
    $digitReg = '/\d/';
    if ($id == null) {
        return false;
    }
    else if (!preg_match($digitReg, $id)) {
        return false;
    }
    else if ($id < 0) {
        return false;
    }
    else {
        return true;
    }
}

function verifyCardNumber($number) {
    $digitReg = '/\d/';
    $symbolReg = '/([-\'"(){}*,.:…;?#~$*<>,.&%£!¬` ])/';

    // Removes special chars
    // https://www.php.net/manual/en/function.preg-replace.php
    if ($number != null) {
        $number = preg_replace($symbolReg,"", $number);
    }

    if ($number == null) {
        echo nl2br("Card number cannot be null\n");
        return false;  
    }
    else if (!preg_match($digitReg, escape($number))) {
        echo nl2br("Card number must be only digits\n");
        return false;
    }
    else if (strlen(escape($number)) != 16) {
        echo nl2br("Card number must be 16 numerical digits\n");
        return false;
    }
    else {
        return true;
    }
}

function verifyPhoneNumber($number) {
    // <3 regexr.com
    $phoneNumberReg = '/\+[\d]{1,3}-[\d]{1,3}-[\d]{1,4}-[\d]{1,4}/';
    if ($number == null) {
        echo nl2br("Phone number cannot be null\n");
        return false;
    }
    else if (preg_match($phoneNumberReg, $number)) {
        return true;
    }
    else {
        echo nl2br("Phone Number must be in the format of +X-XXX-XXXX-XXXX\n");
        return false;
    }
}

function escape($data) {
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    $data = trim($data);
    $data = stripslashes($data);
    return ($data);
} 