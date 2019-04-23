<?php
header("Content-type: text/html; charset=utf-8");
echo '排序<br>';
$arrY= array(1,34,323,23,22,65,53,874,643,6723,33,673,323,93,39,455,3);
$arrY = array(10,11,12,13,2,3,4,5,6,7,8,1);

$textMax = 100000;	
/*
  插入排序1 by yuemingr 
*/
function insert_sort1($arr){
	$len = count($arr);
    //echo "<br>tttt:" . implode(',',$arr) . "<br>";
	for($i=1;$i<$len;$i++){
        if($arr[$i] > $arr[$i-1]){
                continue;
        }
		for($j=$i-1;$j>=0;$j--){
            //echo "i:$i<br>";         
			if($arr[$i] > $arr[$j] && $i-$j > 1){
                //echo "  j:$j   i=$i<br>";
                break;
			}
		}
        
    	//$k = $i;
		$temp = $arr[$i];
		for($k = $i;$k > $j+1;$k--){
			//echo "<br> i:$i j:$j  k:$k<br>";
			$arr[$k] = $arr[$k-1];
		}
		$arr[$j+1] = $temp;
        //echo "<br>" . implode(',',$arr) . "<br>";
	}
	return $arr;
}

/*插入排序法 网上
*/

/*
* 插入排序法
* 每步将一个待排序的纪录，按其关键码值的大小插入前面已经排序的文件中适当位置上，直到全部插入完为止。
* 算法适用于少量数据的排序，时间复杂度为O(n^2)。是稳定的排序方法。
* */
function insertSort($array){ //从小到大排列
//先默认$array[0]，已经有序，是有序表
    for($i = 1;$i < count($array);$i++){
        $insertVal = $array[$i]; //$insertVal是准备插入的数
        $insertIndex = $i - 1; //有序表中准备比较的数的下标
        while($insertIndex >= 0 && $insertVal < $array[$insertIndex]){
            $array[$insertIndex + 1] = $array[$insertIndex]; //将数组往后挪
            $insertIndex--; //将下标往前挪，准备与前一个进行比较
        }
        if($insertIndex + 1 !== $i){
            $array[$insertIndex + 1] = $insertVal;
        }
    }
    return $array;
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


echo "<br>php排序实现1 by yuemingr   <br>";
$testMem->start();
for($ss = 0;$ss<$textMax;$ss++){
	//echo "$ss, $textMax";
    $arr = $arrY;
	$arr = sort($arr);
}
var_dump($arr);
$testMem->over();


echo "<br>插入排序实现1 by yuemingr   <br>";
$testMem->start();
for($ss = 0;$ss<$textMax;$ss++){
	//echo "$ss, $textMax";
    $arr = $arrY;
	$arr = insert_sort1($arr);
}
var_dump($arr);
$testMem->over();
 

echo "<br>插入排序实现1 by yuemingr   <br>";
$testMem->start();
for($ss = 0;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = $arrY;
	$arr = insert_sort1($arr);
}
var_dump($arr);
$testMem->over();




echo "<br>插入排序实现2 by 网上  <br>";
$testMem->start();
for($ss = 0;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = $arrY;
	$arr = insertSort($arr);
}
var_dump($arr);
$t2 = microtime(true);
$testMem->over();

echo "<br>插入排序实现2 by 网上  <br>";
$testMem->start();
for($ss = 0;$ss<$textMax;$ss++){
	//echo "$ss,";
	$arr = $arrY;
	$arr = insertSort($arr);
}
var_dump($arr);
$testMem->over();