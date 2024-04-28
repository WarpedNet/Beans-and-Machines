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

    //using the nl2br() function: https://www.php.net/manual/en/function.nl2br.php
    //this is used to echo a break before newlines in the string.
    

    switch($password) {
        case (strlen($password) < 5 || strlen($password) > 30):
            echo nl2br("Password must be at least 5-30 characters long." . "\n");
            echo nl2br("\n");
            return false;
        case (!preg_match($numReg, $password)):
            echo nl2br("Password must contain at least 1 number.". "\n");
            echo nl2br("\n");
            return false;
        case (null):
            echo nl2br("Password cannot be null." . "\n");
            echo nl2br("\n");
            return false;
        case (!preg_match($symbolReg, $password)):
            echo nl2br("Password must contain at least 1 special character.". "\n");
            echo nl2br("\n");
            return false;
        case (!preg_match($capitalReg, $password)):
            echo nl2br("Password must contain at least 1 capital character." . "\n");
            echo nl2br("\n");
            return false;
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
    
}

function escape($data) {
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    $data = trim($data);
    $data = stripslashes($data);
    return ($data);
} 