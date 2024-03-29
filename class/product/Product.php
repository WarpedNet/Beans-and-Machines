<?php
namespace class\product;

class Product // product class
{
    // variables
    private $productID;
    private $productName;
    private $stock;
    private $expiraryDate;

    // set and get functions
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setExpiraryDate($expiraryDate) {
        $this->expiraryDate = $expiraryDate;
    }

    public function getExpiraryDate() {
        return $this->expiraryDate;
    }

    // display function
    public function displayProduct() {
        echo "
            <td>$this->productID</td>
            <td>$this->productName</td>
            <td>$this->expiraryDate</td>
            <td>$this->stock</td>
            ";
    }
}
?>