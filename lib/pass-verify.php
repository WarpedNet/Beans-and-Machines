<?php

// function passwordVerify($password) {
//     $pArray = str_split($password);
//     $nums = array('1','2','3','4','5','6','7','8','9','0');
//     switch ($pArray){
//         case sizeof($pArray) < 5:
//             echo 'Password is too short';
//             return false;
//             break;
//         // case !in_array($nums, $pArray):
//         //     echo 'Password needs to contain a number.';
//         //     return false;
//         //     break;
//         default:
//             return true;
//     }
// };

// https://www.php.net/manual/en/function.preg-match.php
function passwordVerify($password) {
    $numReg = '/\d/';
    $symbolReg = '/([-\'"()*,.:…;?#~$*<>,.&%£!¬`])/';

    switch($password) {
    case (strlen($password) < 5):
        echo "Password must be atleast 5 characters long";
        return false;
    case (!preg_match($numReg, $password)):
        echo "Password must contain numbers";
        return false;
    case (!preg_match($symbolReg, $password)):
        echo "Password must contain a symbol";
        return false;
    default:
        return true;
    }
}
