<?php
/**
* php 流程控制语句
*/
$a = 1;
if($a > 1){
	echo '>1';
}else{
	echo '<1';
}

for($i=0;$i<12;$i++){
	echo "$i-";
}

$i = 1;
while($i<10){
	echo $i;
	$i++;
}

$i = 0;
do{
	echo $i;
	$i++;
} while($i<10);

$arr = [1,3,64,23];
foreach($arr as $key => $val){
	echo $val;
}
$echo val;
//数组最后一个元素的 $value 引用在 foreach 循环之后仍会保留。建议使用 unset() 来将其销毁。 
//Note: 
//foreach 不支持用"@"来抑制错误信息的能力。 
//PHP 5.5 增添了遍历一个数组的数组的功能并且把嵌套的数组解包到循环变量中，只需将 list() 作为值提供。

$arr = [
	[1,2],
	[3,4],
];
foreach($arr as list($a,$b){
	echo "A:$a;B:$b\n";
}

$i = 1;
while($i <10){
	if($i<3){
		break;
	}
	if($i<2){
		continue;
	}
	echo $i;
	$i++;
}

$i = 1;
while(++$i){
	switch($i){
		case 5:
			echo "at 5\n";
			break 1; //只退出 switch
		case 10:
			echo "at 10 \n";
			break 2; //退出 switch 和 while 
		default:
			break;
	}
}


