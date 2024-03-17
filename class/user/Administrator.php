<?php

namespace user;
class Administrator
{
    private $adminID;
    private $fName;
    private $sName;

    public function setAdminID($adminID)
    {
        $this->adminID = $adminID;
    }

    public function getAdminID()
    {
        return $this->adminID;
    }

    public function setfName($fName)
    {
        $this->fName = $fName;
    }

    public function getfName()
    {
        return $this->fName;
    }

    public function setsName($sName)
    {
        $this->sName = $sName;
    }

    public function getsName()
    {
        return $this->sName;
    }

    public function displayAdministrator() {
        return "
        AdminID: $this->adminID
        First Name: $this->fName
        Surname: $this->sName
        ";
    }
}

?>