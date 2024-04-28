<?php 

//this will be the sample passwords for our equivalence path testing
$valid = "123SesameStreet()";
$nodigit = "bxpU(BXTVi";
$toosmall = "pass";
$toobig = "PasswordPasswordPasswordPassword123*";
$nosymbol = "BoXc2kmmHGPYqVpflq1S";
$nocaps = "qwertyuiopasdhjk123&";
$null = "";
$noletters = "123987";


//method to check the password and make sure it is from the specific requirements
//
function passwordVerify($password) {
    $numReg = '/\d/';
    $symbolReg = '/([-\'"()*,.:…;?#~$*<>,.&%£!¬`])/';
    $capitalReg = '/[A-Z]/';
    
    //using the nl2br() function: https://www.php.net/manual/en/function.nl2br.php
    //this is used to echo a break before newlines in the string.
    echo nl2br("Testing password: " . $password . "\n");

    switch($password) {
        case (strlen($password) < 5 || strlen($password) > 30):
            echo nl2br("Password must be at least 5-30 characters long." . "\n");
            echo nl2br("\n");
            return false;
        case (!preg_match($numReg, $password)):
            echo nl2br("Password must contain at least 1 number.". "\n");
            echo nl2br("\n");
            return false;
        case (!preg_match($symbolReg, $password)):
            echo nl2br("Password must contain at least 1 special character.". "\n");
            echo nl2br("\n");
            return false;
        case (!preg_match($capitalReg, $password)):
            echo nl2br("Password must contain at least 1 alphanumeric character." . "\n");
            echo nl2br("\n");
            return false;
        case (null):
            echo nl2br("Password cannot be null." . "\n");
            echo nl2br("\n");
            return false;
        default:
            echo nl2br("Password is valid." . "\n");
            echo nl2br("\n");
            return true;
    }
}


