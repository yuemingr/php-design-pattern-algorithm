<?php
/**
* php ���̿������
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
//�������һ��Ԫ�ص� $value ������ foreach ѭ��֮���Իᱣ��������ʹ�� unset() ���������١� 
//Note: 
//foreach ��֧����"@"�����ƴ�����Ϣ�������� 
//PHP 5.5 �����˱���һ�����������Ĺ��ܲ��Ұ�Ƕ�׵���������ѭ�������У�ֻ�轫 list() ��Ϊֵ�ṩ��

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
			break 1; //ֻ�˳� switch
		case 10:
			echo "at 10 \n";
			break 2; //�˳� switch �� while 
		default:
			break;
	}
}


