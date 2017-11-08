<?php
	function memory_usage() {   
	  $memory     = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';  
	  return $memory; 
	} 
	header("Content-type: text/html; charset=utf-8");
	echo '排序<br>';
	$arr= array(1,34,323,23,22,65,53,874,643,6723,33,673,323,93,39,455,3);
		$arr = array(10,2,3,4,5,6,7,8,1);
	$textMax = 10000;
/*
* @param 选择排序法
* 每一次从待排序的数据元素中选出最小（或最大）的一个元素，存放在序列的起始位置，直到全部待排序的数据元素排完。
* 选择排序是不稳定的排序方法（比如序列[5， 5， 3]第一次就将第一个[5]与[3]交换，导致第一个5挪动到第二个5后面）
* */

/*
  选择排序1 by yuemingr 
*/
function getxz1y($arr){
	$len = count($arr);
	for($i=0;$i<$len;$i++){
		$jxb = $i;
		//echo "-- --jxb:$jxb<br>";
		for($j=1;$j<$len-$i;$j++){
			//echo "-- x:$j+$i<br>";
			if($arr[$jxb]>$arr[$j+$i]){
				$jxb = $j+$i; 
			}
		}
		if($jxb != $i){
			$temp = $arr[$i];
			$arr[$i] = $arr[$jxb];
			$arr[$jxb] = $temp;
		}
	}
	return $arr;
}
function getxz1($arr){
	$len = count($arr);
	for($i=0;$i<$len;$i++){
		$jxb = $i;
		//echo "-- --jxb:$jxb<br>";
		for($j=$i+1;$j<$len;$j++){
			//echo "-- x:$j+$i<br>";
			if($arr[$jxb]>$arr[$j]){
				$jxb = $j; 
			}
		}
		if($jxb != $i){
			$temp = $arr[$i];
			$arr[$i] = $arr[$jxb];
			$arr[$jxb] = $temp;
		}
	}
	return $arr;
}

/*  选择排序法2  by 网上
*/
function getxz2($arr){
	for($i=0,$len=count($arr);$i<$len-1;$i++){
		$p = $i;
		for($j=$i+1;$j<$len;$j++){
			if($arr[$p] > $arr[$j]){
				$p = $j;
			}
		}
		if($p != $i){
			$tmp = $arr[$p];
			$arr[$p] = $arr[$i];
			$arr[$i] = $tmp;
		}
	}
	return $arr;
}


class testMem{
	public $starTimer;
	public $overTimer;
	public $starMem;
	public $overMem;
	
	public function  start(){
		$this->starTimer = microtime(true);
		$this->starMem = '开始内存：'.memory_get_usage(). '<br>'; 
	}
	public function Over(){
		$this->overTimer = microtime(true);
		$this->overMem = '开始内存：'.memory_get_usage(). '<br>'; 
		 
		echo '耗时'.round($this->overTimer-$this->starTimer,3).'秒<br>';
		echo  $this->starMem;
		echo 'Now memory_get_usage: ' . memory_get_usage() . '<br />';
	}
		
}
$testMem = new testMem();


echo "<br>选择实现1 by yuemingr   <br>";
$testMem->start();
for($ss = 1;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = getxz1($arr);
}
var_dump($arr);
$testMem->over();
echo "KKKK";

echo "<br>选择实现1 by yuemingr   <br>";
$testMem->start();
for($ss = 1;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = getxz1($arr);
}
var_dump($arr);
$testMem->over();




echo "<br>选择实现2 by 网上  <br>";
$testMem->start();
for($ss = 0;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = getxz2($arr);
}
var_dump($arr);
$t2 = microtime(true);
$testMem->over();

echo "<br>选择实现2 by 网上  <br>";
$testMem->start();
for($ss = 0;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = getxz2($arr);
}
var_dump($arr);
$testMem->over();