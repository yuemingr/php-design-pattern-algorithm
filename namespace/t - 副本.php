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