<?php

class paymentInfo // payment info class
{
    // variables
    private $userName;
    private $cardNumber;
    private $cardExpDate;
    private $cardCVV;
    private $cardType;

    // set and get functions
    public function setUserName($userName) {
        $this->userName = $userName;
    }
    public function getUserName() {
        return $this->userName;
    }
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
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

    public function checkCardNumber($cardNumber)
    {
        try {
            require_once  __DIR__."/../../src/DBconnect.php";
            require_once  __DIR__."/../../src/validation.php";
            
            $conn = DBconnect();
            $stmt = $conn->prepare("SELECT cardNumber FROM paymentinfo where cardNumber = :cardNumber");
            $stmt->bindParam("cardNumber", $cardNumber, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return false;
            }
            else{
                return true;
            }
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
        
    }
    public function sendToDatabase() {
        try {
            require_once __DIR__."/../../src/DBconnect.php";
            require_once __DIR__."/../../src/validation.php";

            $paymentInfo = array(
                "userName"      => escape($this->userName),
                "cardNumber"    => escape($this->cardNumber),
                "cardExpDate"   => escape($this->cardExpDate),
                "cardCVV"       => escape($this->cardCVV),
                "cardType"      => escape($this->cardType)
            );

            $query = sprintf(
                "INSERT INTO paymentInfo (%s) values (%s)",
                implode(", ", array_keys($paymentInfo)),
                ":" . implode(", :", array_keys($paymentInfo))
            );
            $connection = DBconnect();

            return $connection->prepare($query)->execute($paymentInfo);
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }
}

?>