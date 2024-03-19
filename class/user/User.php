<?php

namespace user;

class User // user class
{
    // variables
    private $email;
    private $password;
    private $phoneNum;

    // set and get functions
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
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

    // display method
    public function displayUser() {
        return "
            Email: $this->email
            Password: $this->password
            PhoneNum: $this->phoneNum
        ";
    }
}

?>