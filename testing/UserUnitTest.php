<?php
// DATABASE MUST BE NEWLY REMADE FOR THESE TESTS TO WORK
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase {
	public function testSetGet() {
		require_once "../../class/user/user.php";
		$userObj = new user();

		$userObj->setUsername("exampleTest");
		$userObj->setPassword("Password1#");
		$userObj->setEmail("exampleTest@example.com");
		$userObj->setPhoneNum("+1-111-1111-1111");
		$userObj->setAdmin(false);

		$this->assertEquals("exampleTest", $userObj->getUsername());
		$this->assertEquals("Password1#", $userObj->getPassword());
		$this->assertEquals("exampleTest@example.com", $userObj->getEmail());
		$this->assertEquals("+1-111-1111-1111", $userObj->getPhoneNum());
		// Cant do assertFalse because 0 is not false & sql doesnt do false it does only 1 & 0
		$this->assertEquals($userObj->isAdmin(), "0");	
	}

	public function testSendGetToFromDB() {
		require_once "../../class/user/user.php";
		$userObj = new user();

		$userObj->setUsername("exampleTest");
		$userObj->setPassword("Password1#");
		$userObj->setEmail("exampleTest@example.com");
		$userObj->setPhoneNum("+1-111-1111-1111");
		$userObj->setAdmin(false);

		$userObj->sendToDatabase();

		$this->assertTrue($userObj->getUserFromDatabase("exampleTest","Password1#"));

		$userObj->getUserFromDatabaseByID(2);

		$this->assertEquals($userObj->getUsername(), "exampleTest");
		$this->assertEquals($userObj->getPassword(), "Password1#");
		$this->assertEquals($userObj->getEmail(), "exampleTest@example.com");
		$this->assertEquals($userObj->getPhoneNum(), "+1-111-1111-1111");
		// Cant do assertFalse because 0 is not false & sql doesnt do false it does only 1 & 0
		$this->assertEquals($userObj->isAdmin(), "0");	

		$this->assertTrue(count($userObj->getAllUsers()) == 2);	// Equal to 2 because of the default admin account
	}

	public function testUpdateDeleteInDB() {
		require_once "../../class/user/user.php";
		$userObj = new user();

		$userObj->setUsername("exampleTest");
		$userObj->setPassword("Password1#");
		$userObj->setEmail("exampleTest@example.com");
		$userObj->setPhoneNum("+1-111-1111-1111");
		$userObj->setAdmin(false);

		$userObj->sendToDatabase();

		$userObj->getUserFromDatabaseByID(3);

		$this->assertEquals($userObj->getUsername(), "exampleTest");
		$this->assertEquals($userObj->getPassword(), "Password1#");
		$this->assertEquals($userObj->getEmail(), "exampleTest@example.com");
		$this->assertEquals($userObj->getPhoneNum(), "+1-111-1111-1111");
		// Cant do assertFalse because 0 is not false & sql doesnt do false it does only 1 & 0
		$this->assertEquals($userObj->isAdmin(), "0");


		$userObj->setUsername("testest");
		$userObj->setPassword("123SesemeSt(1");
		$userObj->setEmail("looneyTown@gmail.com");
		$userObj->setPhoneNum("+2-22-222-222");
		$userObj->setAdmin(true);

		$userObj->updateUser(3);
		$userObj->getUserFromDatabaseByID(3);

		$this->assertEquals($userObj->getUsername(), "testest");
		$this->assertEquals($userObj->getPassword(), "123SesemeSt(1");
		$this->assertEquals($userObj->getEmail(), "looneyTown@gmail.com");
		$this->assertEquals($userObj->getPhoneNum(), "+2-22-222-222");
		// Cant do assertTrue because 1 != True & sql doesnt do True it does only 1 & 0
		$this->assertEquals($userObj->isAdmin(), "1");

		$initCount = count($userObj->getAllUsers());
		$userObj->deleteUser(3);

		$this->assertTrue(count($userObj->getAllUsers()) < $initCount);
	}
	
}