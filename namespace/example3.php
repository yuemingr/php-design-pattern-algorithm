<?php
namespace namespacename3;
class classname
{
	function __construct()
	{
		echo  __NAMESPACE__ . ":" . __METHOD__ . "<br>";
	}
}
function funcname()
{
	echo __FUNCTION__ . "<br>";
}
const constname = "namespaced";
 