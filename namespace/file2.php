<?php
namespace Foo\Bar;
include 'file1.php';

const FOO = 2;
function foo() {}
class foo
{
	static function staticmethod() { echo "<br> Foo/Bar/foo::staticmethod()<br>";}
}

foo();
foo::staticmethod();
echo FOO;

subnamespace\foo();
subnamespace\foo::staticmethod();
echo subnamespace\FOO;