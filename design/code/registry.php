<?php
require_once 'simpletest/autorun.php';
//require_once 'simpletest/reporter.php';
//the test
class TestingTestCase extends UnitTestCase{
    function testRetistryMonoState(){
		
		$reg = new RegistryMonoState;
		$reg2 = new RegistryMonoState;
		$this->assertFalse($reg->isValid('key1'));
		$this->assertNull($reg->get('key1'));
		$test_value = 'cccd'; 
		$reg->set('key',$test_value);
		$this->assertEqual($test_value,$reg2->get('key'));
	}
}
 //run the test
$test = new TestingTestCase('Testing Unit Test');
$test->run(new HtmlReporter());

class RegistryMonoState{
	protected static $store = array();
	function isValid($key){
		return array_key_exists($key,RegistryMonoState::$store);
	}
	function get($key){
		if(array_key_exists($key,RegistryMonoState::$store))
		return RegistryMonoState::$store[$key];
	}
	function set($key,$obj){
		RegistryMonoState::$store[$key] = $obj;
	}
}