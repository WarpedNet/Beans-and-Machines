<?php

namespace user;

class Customer
{
    private $isMember;
    private $address;
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
    function displayCustomer() {
        $customer = new Customer();
        $customer->address = "address";
        $customer->isMember = true;
    }
        
}
