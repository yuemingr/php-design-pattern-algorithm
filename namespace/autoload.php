<?php
spl_autoload_register(function($class_name){
	if(file_exists($class_name . ".php")){
		require_once $class_name . '.php';
	}
	require_once 'example2.php';
	//echo "cc";
});

spl_autoload_register(function($class_name){
	require_once $class_name . '_c.php';
});


$obj = new MyClass1();
$obj2 = new MyClass2();
