<?php

namespace user;
use user;

class Customer extends User // customer class
{
    // variables
    private $isMember;
    private $address;

    // set and get functions
    public function getIsMember()
    {
        return $this->isMember;
    }

    
    public function setIsMember($isMember)
    {
        $this->isMember = $isMember;
    }

    public function getAddress()
    {
        return $this->address;
    }

    
    public function setAddress($address)
    {
        $this->address = $address;
    }

    // display function
    public function displayCustomer() {
        return "
            IsMember: $this->isMember
            Address: $this->address
        ";
    }
        
}
