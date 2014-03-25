<?php
require_once __DIR__ . '/../classes/Input.php';
class InputTest extends PHPUnit_Framework_TestCase 
{	
	public function tearDown()
	{
		if(isset($_GET['email'])){
			unset($_GET['plan']);	
		}
		if(isset($_GET['email'])){
			unset($_GET['plan']);	
		}
		
	}
	public function test_set_properly(){
		$_GET['email'] = 'dtang@usc.edu';
		$email = Input::get('email');
		$this->assertEquals($email,'dtang@usc.edu');
	}
	public function test_null_and_default(){
		$email = Input::get('email');
		$this->assertNull($email);
		$plan = Input::get('plan','standard');
		$this->assertEquals($plan,'standard');
	}
}
?>