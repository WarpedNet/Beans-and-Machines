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
function passwordVerify($password) {
    $numReg = '/\d/';
    $symbolReg = '/([-\'"()*,.:…;?#~$*<>,.&%£!¬`])/';

    switch(escape($password)) {
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

function escape($data) {
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    $data = trim($data);
    $data = stripslashes($data);
    return ($data);
} 