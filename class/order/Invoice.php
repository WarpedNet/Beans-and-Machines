<?php

namespace order;

class Invoice
{
    private $invoiceID;
    public function getInvoiceID()
    {
        return $this->invoiceID;
    }
    public function setInvoiceID($invoiceID)
    {
        $this->invoiceID = $invoiceID;
    }
    
    
    private $cost;
    
    public function getCost()
    {
        return $this->cost;
    }
    public function setCost($cost)
    {
        $this->cost = $cost;
    }
}