<?php
	header("Content-type: text/html; charset=utf-8");
	echo '排序<br>';
	$arrY= array(1,34,323,23,22,65,53,874,643,6723,33,673,323,93,39,455,3);
	$arrY = array(10,11,12,13,2,3,4,5,6,7,8,1);
	
	$textMax = 100;	
	/*
  插入排序1 by yuemingr 
*/
function insert_sort1($arr){
	$len = count($arr);
	for($i=1;$i<$len;$i++){
		for($j=$i-1;$j>=0;$j--){
			if($arr[$i] > $arr[$j]){
				//$k = $i;
				$temp = $arr[$i];
				for($k = $i;$k > $j;$k--){
					//echo "<br> i:$i j:$j  k:$k<br>";
					$arr[$k] = $arr[$k-1];
				}
				$arr[$j] = $temp;
			}
		}
	}
	return $arr;
}

/*插入排序法 网上
*/

/*  选择排序法2  by 网上
*/
function getxz2($arr){
	echo "-ww-";
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


echo "<br>插入排序实现1 by yuemingr   <br>";
$testMem->start();
for($ss = 1;$ss<$textMax;$ss++){
	echo "$ss, $textMax";
    $arr = $arrY;
	$arr = insert_sort1($arr);
}
var_dump($arr);
$testMem->over();
echo "KKKK";

echo "<br>选择实现1 by yuemingr   <br>";
$testMem->start();
for($ss = 1;$ss<$textMax;$ss++){
	echo "$ss,";
	$arr = $arrY;
	$arr = getxz2($arr);
}
var_dump($arr);
$testMem->over();




echo "<br>选择实现2 by 网上  <br>";
$testMem->start();
for($ss = 0;$ss<$textMax;$ss++){
	echo "$ss,";
	$arr = $arrY;
	$arr = getxz2($arr);
}
var_dump($arr);
$t2 = microtime(true);
$testMem->over();

echo "<br>选择实现2 by 网上  <br>";
$testMem->start();
for($ss = 0;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = $arrY;
	$arr = getxz2($arr);
}
var_dump($arr);
$testMem->over();