<?php
// DATABASE MUST BE NEWLY REMADE FOR THESE TESTS TO WORK
use PHPUnit\Framework\TestCase;

class ProductOrderUnitTest extends TestCase {
	public function testSetGet() {
		require_once "../../class/order/ProductOrder.php";
		$productOrderObj = new ProductOrder();

		$productOrderObj->setUserName("exampleTest");
		$productOrderObj->setProductName("Arabica Dark Roast");
		$productOrderObj->setQuantity("1111");

		$this->assertEquals("exampleTest", $productOrderObj->getUserName());
		$this->assertEquals("Arabica Dark Roast", $productOrderObj->getProductName());
		$this->assertEquals("1111", $productOrderObj->getQuantity());
	}

	public function testSendGetToFromDB() {
		require_once "../../class/order/ProductOrder.php";
		$productOrderObj = new ProductOrder();

		$productOrderObj->setUserName("exampleTest");
		$productOrderObj->setProductName("Arabica Dark Roast");
		$productOrderObj->setQuantity("1111");

		$initCount = count($productOrderObj->getAllOrders());

		$productOrderObj->sendToDatabase();
		$this->assertTrue(count($productOrderObj->getAllOrders()) > $initCount);

		$productOrderObj->getOrder(1);

		$this->assertEquals("exampleTest", $productOrderObj->getUserName());
		$this->assertEquals("Arabica Dark Roast", $productOrderObj->getProductName());
		$this->assertEquals("1111", $productOrderObj->getQuantity());
	}

	public function testUpdateDeleteToFromDB() {
		require_once "../../class/order/ProductOrder.php";
		$productOrderObj = new ProductOrder();

		$productOrderObj->setUserName("exampleTest");
		$productOrderObj->setProductName("Arabica Dark Roast");
		$productOrderObj->setQuantity("1111");
		$productOrderObj->sendToDatabase();

		$productOrderObj->getOrder(2);

		$this->assertEquals("exampleTest", $productOrderObj->getUserName());
		$this->assertEquals("Arabica Dark Roast", $productOrderObj->getProductName());
		$this->assertEquals("1111", $productOrderObj->getQuantity());

		$productOrderObj->setUserName("newUser");
		$productOrderObj->setProductName("African Light Roast");
		$productOrderObj->setQuantity("122");
		$productOrderObj->updateOrder(2);

		$productOrderObj->getOrder(2);

		$this->assertEquals("newUser", $productOrderObj->getUserName());
		$this->assertEquals("African Light Roast", $productOrderObj->getProductName());
		$this->assertEquals("122", $productOrderObj->getQuantity());

		$initCount = count($productOrderObj->getAllOrders());

		$productOrderObj->deleteOrder(2);

		$this->assertTrue($initCount > count($productOrderObj->getAllOrders()));
	}
}