<?php
namespace namespacename;
//use namespacename3\classname as n3c;
class classname
{
	function __construct()
	{
		echo __METHOD__ . "<br>";
	}
}
function funcname()
{
	echo __FUNCTION__ . "<br>";
}
const constname = "namespaced";
include('example1.php');
//$a3 = new n3c;
$obj = new classname;
$a = 'classname';
$obj = new $a;
$b = 'funcname';
$b();
echo constant('constname') . "<br>";
