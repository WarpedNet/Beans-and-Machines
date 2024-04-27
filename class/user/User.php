<?php

class user // user class
{
    // variables
    private $email;
    private $username;
    private $password;
    private $phoneNum;
    private $isAdmin;   // Boolean

    // set and get functions
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function getUsername() {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
       return $this->password;
    }

    public function setPhoneNum($phoneNum)
    {
        $this->phoneNum = $phoneNum;
    }

    public function getPhoneNum()
    {
        return $this->phoneNum;
    }

    public function isAdmin() {
        return $this->isAdmin;
    }
    // Is admin must be a bool value
    public function setAdmin($isAdmin) {
        $this->isAdmin = (boolval($isAdmin) && $isAdmin) ? 1 : 0;
    }

    // display method
    public function displayUser() {
        return "
            Email: $this->email\n
            Username: $this->username\n
            Password: $this->password\n
            PhoneNum: $this->phoneNum\n
        ";
    }

    public function sendToDatabase() {
        try {
            require_once '../src/DBconnect.php';
            require_once '../src/validation.php';

            $new_user = array(
                "username" => escape($this->username),
                "password" => escape($this->password),
                "email"    => escape($this->email),
                "phoneNum" => escape($this->phoneNum),
                "isAdmin"  => escape($this->isAdmin)
            );

            $query = sprintf(
                                "INSERT INTO users (%s) values (%s)",
                                implode(", ", array_keys($new_user)),
                                ":" . implode(", :", array_keys($new_user)));
            $connection = DBconnect();

            // Returns true if the query was successful, else returns false
            return $connection->prepare($query)->execute($new_user);
            
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }

    public function getUserFromDatabase($username, $password) {
        try {
            // requiring the database connection file
            require_once '../src/DBconnect.php';

            $connection = DBconnect();

            // sql query for getting data from the database
            $query = 'SELECT * FROM users WHERE username = :username AND password = :password';

            // preparing and executing the query
            $stmt = $connection->prepare($query);
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            $stmt->execute();

            // fetching
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // return true if username & password found, else return false
            if ($result) {

                $this->username = $result["username"];
                $this->password = $result["password"];
                $this->email = $result["email"];
                $this->phoneNum = $result["phoneNum"];
                $this->isAdmin = $result["isAdmin"];
                
                return true;
            }
            else {
                return false;
            }
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }
    public function getUserFromDatabaseByID($userID) {
        try {
            // requiring the database connection file
            require_once '../src/DBconnect.php';

            $connection = DBconnect();

            // sql query for getting data from the database
            $query = 'SELECT * FROM users WHERE userID = :userID';

            // preparing and executing the query
            $stmt = $connection->prepare($query);
            $stmt->bindParam(":userID", $userID, PDO::PARAM_STR);
            $stmt->execute();

            // fetching
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $this->username = $result["username"];
                $this->password = $result["password"];
                $this->email = $result["email"];
                $this->phoneNum = $result["phoneNum"];
                $this->isAdmin = $result["isAdmin"];
            }
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }
    public function getAllUsers() {
        try {
            require_once '../src/DBconnect.php';

            $connection = DBconnect();

            $query = "SELECT * FROM users";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }
    public function deleteUser($userID) {
        try {
            require_once "../src/DBconnect.php";

            $connection = DBconnect();

            $query = "DELETE FROM users WHERE userID = :userID";
            $statement = $connection->prepare($query);
            $statement->bindParam("userID", $userID, PDO::PARAM_INT);
            return $statement->execute();
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }
    public function updateUser($userID) {
        try {
            require_once '../src/DBconnect.php';
            require_once '../src/validation.php';

            $connection = DBconnect();

            $new_info = array(
                "userID"     => escape($userID),
                "username"   => escape($this->username),
                "password"   => escape($this->password),
                "email"      => escape($this->email),
                "phoneNum"   => escape($this->phoneNum),
                "isAdmin"    => escape($this->isAdmin)
            );
            $query = sprintf("
                
                UPDATE users SET
                username     = :username,
                password      = :password,
                email   = :email,
                phoneNum    = :phoneNum,
                isAdmin    = :isAdmin
                WHERE userID = :userID;
                "
            );

            $stmt = $connection->prepare($query)->execute($new_info);
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }
}

?>