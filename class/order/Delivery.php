<?php

namespace order;

class Delivery // delivery class
{
    // variables
    private $estArrival;
    private $deliveryCost;
    private $deliveryMethod;
    private $deliveryNotes;
    private $deliveryAddress;

    // set and get functions
    public function setEstArrival($estArrival)
    {
        $this->estArrival = $estArrival;
    }

    public function getEstArrival()
    {
        return $this->estArrival;
    }

    public function setDeliveryCost($deliveryCost)
    {
        $this->deliveryCost = $deliveryCost;
    }

    public function getDeliveryCost()
    {
        return $this->deliveryCost;
    }

    public function setDeliveryMethod($deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod;
    }

    public function getDeliveryMethod()
    {
        return $this->deliveryMethod;
    }

    public function setDeliveryNotes($deliveryNotes)
    {
        $this->deliveryNotes = $deliveryNotes;
    }

    public function getDeliveryNotes()
    {
        return $this->deliveryNotes;
    }

    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    // display function
    public function displayDelivery() {
        return "
        Est Arrival: $this->estArrival
        DeliveryCost: $this->deliveryCost
        DeliveryMethod: $this->deliveryMethod
        DeliveryNotes: $this->deliveryNotes
        DeliveryAddress: $this->deliveryAddress
        ";
    }
}

?>