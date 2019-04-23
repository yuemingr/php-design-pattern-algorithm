<?php
namespace my\name;

class MyClass {}
function myfunction(){}
const MYCONST = 1;

$a = new MyClass;
$c = new \my\name\MyClass;

$a = strlen('hi');

$d = namespace\MYCONST;
echo __NAMESPACE__;
echo $d;
//$d = __NAMESPACE__ . '\MYCONST';
//echo constant($d);

echo " bibao函数";
$greet = function($name)
{
	printf("Hello %s\r\n",$name);
};

$greet("world");
$greet('php');

$message = "hello";
$example = function(){
	var_dump($message);
	echo "ok";
	return "dd";
};
$dd = $example();
echo $example();
//var_dump($dd);

$example = function() use ($message){
	var_dump($message);
};
echo $example();
$example();
$cc = $example();
echo $cc;

$message = 'world';
echo $example();


$example = function() use(&$message){
	var_dump($message);
};
$message = "kkkk";

echo $example();

class foo {
	public $value = 42;
	
	public function &getValue() {
		return $this->value;
	}
}

$obj = new foo;
$myValue = &$obj->getValue();
$obj->value = 2;
echo $myValue;
$myValue = 3;
echo $obj->value;

