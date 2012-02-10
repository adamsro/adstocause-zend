<?php

// require_once 'PHPUnit/Framework/TestCase.php';
//require_once '../application/controllers/RegisterController.php';

// class RegisterControllerTest extends PHPUnit_Framework_TestCase

class RegisterControllerTest extends ControllerTestCase
{
	//   protected $register;

	public function setUp()
	{
		parent::setUp();
		//   $this->register = new RegisterController();
	}
	public function testCanDoUnitTest() {
		$this->assertTrue(true);
	}
	public function testGetPrice() {
		$price = 50;
		$promos = 'add50, 100';
		PromoCodes::calculatePromos($price, $promos);
	}

	public function tearDown()
	{
		/* Tear Down Routine */
	}


}

