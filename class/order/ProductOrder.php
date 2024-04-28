<?php

class ProductOrder // product order class
{
	// variables
	private $userName;
	private $productName;
	private $quantity;

	// set and get functions
	public function setUserName($userName) {
		$this->userName = $userName;
	}
	public function getUserName() {
		return $this->userName;
	}
	public function setProductName($productName) {
		$this->productName = $productName;
	}
	public function getProductName() {
		return $this->productName;
	}
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}
	public function getQuantity() {
		return $this->quantity;
	}

	public function sendToDatabase() {
		try {
			require_once __DIR__.'/../../src/DBconnect.php';
            require_once __DIR__.'/../../src/validation.php';

            $connection = DBconnect();

            $new_order = array(
            	"userName" 	  => escape($this->userName),
            	"productName" => escape($this->productName),
            	"quantity" 	  => escape($this->quantity)
            );

            $query = sprintf(
                "INSERT INTO productOrder (%s) values (%s)",
                implode(", ", array_keys($new_order)),
                ":" . implode(", :", array_keys($new_order))
            );

            return $connection->prepare($query)->execute($new_order);
		}
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
	}
	public function getAllOrders() {
        try {
            require_once __DIR__.'/../../src/DBconnect.php';

            $connection = DBconnect();
            $query = "SELECT * FROM productOrder";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
	}
	public function deleteOrder($orderID) {
        try {
            require_once __DIR__."/../../src/DBconnect.php";

            $connection = DBconnect();

            $query = "DELETE FROM productOrder WHERE id = :id";
            $statement = $connection->prepare($query);
            $statement->bindParam("id", $orderID, PDO::PARAM_INT);
            return $statement->execute();
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
	}
	public function getOrder($orderID) {
        try {
            require_once __DIR__."/../../src/DBconnect.php";

            $connection = DBconnect();
            $query = "SELECT * FROM productOrder WHERE id = :id";

            $stmt = $connection->prepare($query);
            $stmt->bindParam("id", $orderID, PDO::PARAM_STR);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $this->userName = $result["userName"];
                $this->productName = $result["productName"];
                $this->quantity = $result["quantity"];
            }
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
	}
	public function updateOrder($orderID) {
        try {
            require_once __DIR__.'/../../src/DBconnect.php';
            require_once __DIR__.'/../../src/validation.php';

            $connection = DBconnect();

            $new_info = array(
                "id"            => escape($orderID),
                "userName"   => escape($this->userName),
                "productName"   => escape($this->productName),
                "quantity"    => escape($this->quantity)
            );
            $query = sprintf("
                
                UPDATE productorder SET
                userName     = :userName,
                productName  = :productName,
                quantity     = :quantity
                WHERE id = :id;
                "
            );

            $stmt = $connection->prepare($query)->execute($new_info);
        }
        catch (PDOException $err) {
            echo $query . "<br>" . $err->getMessage();
        }
	}
}
?>