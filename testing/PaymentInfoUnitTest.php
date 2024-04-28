<?php
// DATABASE MUST BE NEWLY REMADE FOR THESE TESTS TO WORK
use PHPUnit\Framework\TestCase;

class PaymentInfoUnitTest extends TestCase {
	public function testSetGet() {
		require_once "../../class/order/PaymentInfo.php";
		$paymentInfoObj = new paymentInfo();

		$paymentInfoObj->setUserName("John Johnson");
		$paymentInfoObj->setCardNumber("1111 1111 1111 1111");
		$paymentInfoObj->setCardExpDate("11/11/2011");
		$paymentInfoObj->setCardCVV("111");
		$paymentInfoObj->setCardType("Mastercard");

		$this->assertEquals("John Johnson", $paymentInfoObj->getUserName());
		$this->assertEquals("1111 1111 1111 1111", $paymentInfoObj->getCardNumber());
		$this->assertEquals("11/11/2011", $paymentInfoObj->getCardExpDate());
		$this->assertEquals("111", $paymentInfoObj->getCardCVV());
		$this->assertEquals("Mastercard", $paymentInfoObj->getCardType());
	}

	public function testCheckCardNumber() {
		require_once "../../class/order/PaymentInfo.php";
		$paymentInfoObj = new paymentInfo();

		$paymentInfoObj->setUserName("John Johnson");
		$paymentInfoObj->setCardNumber("1111 1111 1111 1111");
		$paymentInfoObj->setCardExpDate("11/11/2011");
		$paymentInfoObj->setCardCVV("111");
		$paymentInfoObj->setCardType("Mastercard");

		$this->assertTrue($paymentInfoObj->sendToDatabase());

		$this->assertFalse($paymentInfoObj->checkCardNumber("1111 1111 1111 1111"));
		$this->assertTrue($paymentInfoObj->checkCardNumber("2222 2222 2222 2222"));
	}
}