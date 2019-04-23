<?php
require_once 'simpletest/autorun.php';
require_once dirname(__FILE__) .'/simpletest/mock_objects.php';
//require_once 'simpletest/reporter.php';
//the test
Mock::generate('MockAccumulator');
class TestingTestCase extends UnitTestCase{
    function testCalcTax(){
		$amount = new MockAccumulator($this);
		$amount->setReturnValue('total',200);
		$this->assertEqual(
		14,calc_tax($amount));
	}
}
 //run the test
$test = new TestingTestCase('Testing Unit Test');
$test->run(new HtmlReporter());