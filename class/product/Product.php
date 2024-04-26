<?php
class product
{
    // variables
    private $productName;
    private $productDesc;
    private $productAge;
    private $productVendor;
    private $productPrice;
    private $productStock;

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
    public function setStock($productStock) {
        $this->productStock = $productStock;
    }
    public function getStock() {
        return $this->productStock;
    }

    // display function
    public function displayProduct() {
        echo "
            $this->productName\n
            $this->productDesc\n
            $this->productAge\n
            $this->productVendor\n
            $this->productPrice\n
            $this->productStock\n
            ";
    }
    
    public function getProductFromDB($productName) {
        try {
            require_once "../src/DBconnect.php";

            $connection = DBconnect();
            $query = "SELECT * FROM products WHERE productName = :productName";

            $stmt = $connection->prepare($query);
            $stmt->bindParam("productName", $productName, PDO::PARAM_STR);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->productName = $result["productName"];
            $this->productDesc = $result["productDesc"];
            $this->productAge = $result["productAge"];
            $this->productVendor = $result["productVendor"];
            $this->productPrice = $result["productPrice"];
            $this->productStock = $result["productStock"];
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }
    public function getAllProducts() {
        try {
            require_once '../src/DBconnect.php';

            $connection = DBconnect();
            $query = "SELECT * FROM products";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }

    public function sendProductToDB() {
        try {
            require_once '../src/DBconnect.php';
            require_once '../src/validation.php';

            $connection = DBconnect();

            $new_product = array(
                "productName"   => escape($this->productName),
                "productDesc"   => escape($this->productDesc),
                "productAge"    => escape($this->productAge),
                "productVendor" => escape($this->productVendor),
                "productPrice"  => escape($this->productPrice),
                "productStock"  => escape($this->productStock)
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
    public function updateStock($productID, $stock) {
        try {
            require_once "../src/DBconnect.php";
            require_once "../src/validation.php";

            $connection = DBconnect();

            $query = "UPDATE products SET productStock = :productStock WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->bindValue("productStock", $stock, PDO::PARAM_INT);
            $statement->bindValue("id", $productID, PDO::PARAM_STR);
            return $statement->execute();
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
    }
}
?>