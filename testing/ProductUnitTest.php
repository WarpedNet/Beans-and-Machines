<?php

use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase {
	public function testSetGet() {
		require_once "../../class/product/Product.php";
		$productObj = new product();

		$productObj->setName("Arabica Dark Roast");
		$productObj->setDesc("A fragrently roasted coffee");
		$productObj->setAge("3");
		$productObj->setVendor("In House");
		$productObj->setPrice("12.99");
		$productObj->setStock("1234");

		$this->assertEquals("Arabica Dark Roast", $productObj->getName());
		$this->assertEquals("A fragrently roasted coffee", $productObj->getDesc());
		$this->assertEquals("3", $productObj->getAge());
		$this->assertEquals("In House", $productObj->getVendor());
		$this->assertEquals("12.99", $productObj->getPrice());
		$this->assertEquals("1234", $productObj->getStock());

	}

	public function testSendGetToFromDB() {
		require_once "../../class/product/Product.php";
		$productObj = new product();

		$numProducts = count($productObj->getAllProducts());
		$productObj->setName("Arabica Dark Roast");
		$productObj->setDesc("A fragrently roasted coffee");
		$productObj->setAge("3");
		$productObj->setVendor("In House");
		$productObj->setPrice("12.99");
		$productObj->setStock("1234");
		$productObj->sendProductToDB();

		$this->assertTrue($numProducts < count($productObj->getAllProducts()));

		$productObj->getProductFromDB(1);
		$this->assertEquals("Arabica Dark Roast", $productObj->getName());
		$this->assertEquals("A fragrently roasted coffee", $productObj->getDesc());
		$this->assertEquals("3", $productObj->getAge());
		$this->assertEquals("In House", $productObj->getVendor());
		$this->assertEquals("12.99", $productObj->getPrice());
		$this->assertEquals("1234", $productObj->getStock());
;
	}

	public function testUpdateProductStock() {
		require_once "../../class/product/Product.php";
		$productObj = new product();

		$productObj->setName("Arabica Dark Roast");
		$productObj->setDesc("A fragrently roasted coffee");
		$productObj->setAge("3");
		$productObj->setVendor("In House");
		$productObj->setPrice("12.99");
		$productObj->setStock("1234");
		$productObj->sendProductToDB();

		$productObj->getProductFromDB(2);

		$this->assertEquals($productObj->getStock(), "1234");
		$productObj->updateStock(2, "4");
		$productObj->getProductFromDB(2);
		$this->assertEquals($productObj->getStock(), "4");
	}

	public function testUpdateProduct() {
		require_once "../../class/product/Product.php";
		$productObj = new product();

		$productObj->setName("Arabica Dark Roast");
		$productObj->setDesc("A fragrently roasted coffee");
		$productObj->setAge("3");
		$productObj->setVendor("In House");
		$productObj->setPrice("12.99");
		$productObj->setStock("1234");
		$productObj->sendProductToDB();

		$productObj->getProductFromDB(3);
		$this->assertEquals($productObj->getName(), "Arabica Dark Roast");

		$productObj->setName("African Light Roast");
		$productObj->setDesc("Roasted coffee with Sweet notes");
		$productObj->setAge("6");
		$productObj->setVendor("Nescafe");
		$productObj->setPrice("15.99");
		$productObj->setStock("2222");
		$productObj->updateProduct(3);

		$productObj->getProductFromDB(3);
		$this->assertEquals($productObj->getName(), "African Light Roast");
		$this->assertEquals($productObj->getDesc(), "Roasted coffee with Sweet notes");
		$this->assertEquals($productObj->getAge(), "6");
		$this->assertEquals($productObj->getVendor(), "Nescafe");
		$this->assertEquals($productObj->getPrice(), "15.99");
		$this->assertEquals($productObj->getStock(), "2222");
	}
	
	public function testDeleteProduct() {
		require_once "../../class/product/Product.php";
		$productObj = new product();

		$productObj->setName("Arabica Dark Roast");
		$productObj->setDesc("A fragrently roasted coffee");
		$productObj->setAge("3");
		$productObj->setVendor("In House");
		$productObj->setPrice("12.99");
		$productObj->setStock("1234");
		$productObj->sendProductToDB();

		$initCount = count($productObj->getAllProducts());

		$productObj->deleteProduct(4);

		$this->assertTrue($initCount > count($productObj->getAllProducts()));

	}
	
}