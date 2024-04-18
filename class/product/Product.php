<?php
class product
{
    // variables
    private $productName;
    private $productDesc;
    private $productAge;
    private $productVendor;
    private $productPrice;

    // set and get functions

    public function setName($productName)
    {
        $this->productName = $productName;
    }

    public function getName()
    {
        return $this->productName;
    }
    public function setDesc($productDesc) {
        $this->productDesc = $productDesc;
    }
    public function getDesc($productDesc) {
        return $this->productDesc;
    }

    public function setAge($productAge) {
        $this->productAge = $productAge;
    }

    public function getAge($productAge) {
        return $this->productAge;
    }
    public function setVendor($productVendor) {
        $this->productVendor = $productVendor;
    }
    public function getVendor() {
        return $this->productVendor;
    }
    public function setPrice($productPrice) {
        $this->productPrice = $productPrice;
    }
    public function getPrice() {
        return $this->productPrice;
    }

    // display function
    public function displayProduct() {
        echo "
            $this->productName\n
            $this->productDesc\n
            $this->productAge\n
            $this->productVendor\n
            $this->productPrice\n
            ";
    }
    public function getProductFromDB($productName) {

    }
    public function sendProductToDB() {
        try {
            require_once '../src/DBconnect.php';
            require_once '../class/validation.php';

            $valObj = new validation();
            $connection = DBconnect();

            $new_product = array(
                "productName"   => $valObj->escape($this->productName),
                "productDesc"   => $valObj->escape($this->productDesc),
                "productAge"    => $valObj->escape($this->productAge),
                "productVendor" => $valObj->escape($this->productVendor),
                "productPrice"  => $valObj->escape($this->productPrice)
            );

            $query = sprintf(
                "INSERT INTO products (%s) values (%s)",
                implode(", ", array_keys($new_product)),
                ":" . implode(", :", array_keys($new_product))
            );

            return $connection->prepare($query)->execute($new_product);

        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }

    }
}
?>