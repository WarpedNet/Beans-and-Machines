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

    // Only needs a getter method since it will be set when getting usr data
    public function isAdmin() {
        return $this->isAdmin;
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

            if (passwordVerify($this->password)) {
                $new_user = array(
                    "username" => escape($this->username),
                    "password" => escape($this->password),
                    "email"    => escape($this->email),
                    "phoneNum" => escape($this->phoneNum)
                );

                $query = sprintf(
                                    "INSERT INTO users (%s) values (%s)",
                                    implode(", ", array_keys($new_user)),
                                    ":" . implode(", :", array_keys($new_user)));
                $connection = DBconnect();

                // Returns true if the query was successful, else returns false
                return $connection->prepare($query)->execute($new_user);
            }
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

            // assigning the database variables to php variables
            $this->username = $result["username"];
            $this->password = $result["password"];
            $this->email = $result["email"];
            $this->phoneNum = $result["phoneNum"];
            $this->isAdmin = $result["isAdmin"];

            // return true if username & password found, else return false
            if ($result) {
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
}

?>