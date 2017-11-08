<?php
	function memory_usage() {   
	  $memory     = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';  
	  return $memory; 
	} 
	header("Content-type: text/html; charset=utf-8");
	echo '排序<br>';
	$arr= array(1,34,323,23,22,65,53,874,643,6723,33,673,323,93,39,455,3);
	$arr = array(10,2,3,4,5,6,7,8,1);
	$textMax = 2;
/*冒泡法：     思路分析：法如其名，就是像冒泡一样，每次从数组当中 冒一个最大的数出来。 
 *     比如：2,4,1    // 第一次 冒出的泡是4 
 *                2,1,4   // 第二次 冒出的泡是 2 
 *                1,2,4   // 最后就变成这样 
*/

/*
  冒泡实现1 by yuemingr 
*/
function getpao1($arr){
	$newarr = array();
	$county = count($arr);
	//echo "$county"; 
	for($i=0;$i<$county;$i++){
		//echo $i;
		//$thisItem = 0;
		$j = 0;
		foreach($arr as $k => $v){
		
			if($j>0 && $arr[$thisItem] < $arr[$k]){
				$thisItem = $k;
			}
			if($j == 0){
				$thisItem = $k;
			}
			$j++;
		}
		$newarr[] = $arr[$thisItem];
		unset($arr[$thisItem]);
	}
	return $newarr;
}

/**  冒泡实现2 网上 
*/
function getpao2($arr){
	$county = count($arr);
	
	for($i=0;$i<$county;$i++){
		echo "----w:i=$i<br>";	
		for($j=0;$j<$county-$i-1;$j++){
			echo "--n:j=$j<br>";
			//echo "-$j- ;i:$i COUNT:$county ";
			if($arr[$j] > $arr[$j+1]){
				$temp = $arr[$j+1];
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $temp;
			}
		}
	}
	return $arr;
}

function getpao($arr){
	$len = count($arr);
	for($i=1;$i<$len;$i++){
		echo "i:$i =";
		for($j=0;$j<$len-$i;$j++){
			if($arr[$j]>$arr[$j+1]){
				$temp = $arr[$j];
				$arr[$j] = $arr[$j + 1];
				$arr[$j + 1] = $temp;
			}
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


echo "<br>冒泡实现1 by yuemingr   <br>";
$testMem->start();
for($ss = 1;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = getpao1($arr);
}
var_dump($arr);
$testMem->over();
echo "KKKK";

echo "<br>冒泡实现2 by yuemingr   <br>";
//$arr = array(2,1,9,32,234,23,41,23,21);
$testMem->start();
for($ss = 1;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = getpao($arr);
}
var_dump($arr);
$testMem->over();




echo "<br>冒泡实现2 by 网上  <br>";
$testMem->start();
for($ss = 1;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = getpao2($arr);
}
var_dump($arr);
$t2 = microtime(true);
$testMem->over();

echo "<br>冒泡实现2 by 网上  <br>";
	$arr = array(23,2,32,24,51,65,7,8);
$testMem->start();
for($ss = 1;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = getpao2($arr);
}
var_dump($arr);
$testMem->over();