<?php

namespace order;

class Invoice extends PaymentInfo // invoice class
{
    // variables
    private $invoiceID;
    private $cost;

    // set and get functions
    public function getInvoiceID()
    {
        return $this->invoiceID;
    }
    public function setInvoiceID($invoiceID)
    {
        $this->invoiceID = $invoiceID;
    }
    
    public function getCost()
    {
        return $this->cost;
    }
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    // display function
    public function displayInvoice() {
        return "InvoiceID: $this->invoiceID\n"+$this->displayPaymentInfo();
    }
}