<?php
require "../lib/Operations.php"
namespace product;
class Product
{
    private $productID;
    private $productName;
    private $stock;

    public function setProductID($productID)
    {
        $this->$productID = $productID;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function setProductName($productName)
    {
        $this->$productName = $productName;
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
}
    public function getProduct() {
        return readData("*", "Product");
    }
?>