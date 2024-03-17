<?php

namespace order;
class PaymentInfo
{
    private $cardNumber;
    private $cardExpDate;
    private $cardCVV;
    private $cardType;

    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    public function getCardNumber()
    {
        return this->cardNumber;
    }

    public function setCardExpDate($cardExpDate)
    {
        $this->cardExpDate = $cardExpDate;
    }

    public function getCardExpDate()
    {
        return $this->cardExpDate;
    }

    public function setCardCVV($cardCVV)
    {
        $this->cardCVV = $cardCVV;
    }

    public function getCardCVV()
    {
        return $this->cardCVV;
    }

    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    public function getCardType()
    {
        return $this->cardType;
    }
    public function displayPaymentInfo() {
        return "
            CardNumber: $cardNumber
            CardExpDate: $cardExpDate
            CardCVV: $cardCVV
            CardType: $cardType
        ";
    }
}

?>