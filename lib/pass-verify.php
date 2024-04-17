<?php

function ($password) {
    $pArray = str_split($password);
    $nums = array('1','2','3','4','5','6','7','8','9','0');
    switch ($pArray){
        case sizeof($pArray) < 5:
            echo 'Password is too short';
            break;
        case !in_array($nums,$pArray):
            echo 'Password needs to contain a number.';
            break;
    }
};
