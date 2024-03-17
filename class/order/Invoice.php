<?php

namespace order;

class Invoice extends PaymentInfo
{
    private $invoiceID;
    private $cost;
    private $paymentInfo = new PaymentInfo;

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

    public function displayInvoice() {
        return "InvoiceID: $invoiceID\n"+displayPaymentInfo();
    }
}