<?php
/**
 * php函数 20170103
 * 
 */

/**
 * 数学函数
 * 1.abs()  	求绝对值
 * 2.ceil() 	近一法整数
 * 3.floor() 	舍去法取整
 * 4.fmod() 	浮点取余
 * 5.pow()	返回数的n次方
 * 6.round() 	浮点数四舍五入
 * 7.sqrt()	求平方根
 * 8.max()	求最大值
 * 9.min() 	求最小值
 * 10.mt_rand()	更好的随机数
 * 11.rand()	随机数
 * 12.pi() 	获取圆周率
 *
 * 字符函数
 * 13.trim()	删除字符串首尾空格或者其他预定义字符
 * 14.rtrim()   
 * 15 ltrim()
 * 16 chop() rtrim()的别名
 * 17 dirname() 返回路径中目录部分
 * 18 str_pad()	把字符串填充为指定长度
 * 19 str_repeat 重复使用指定字符串
 * 20 str_split() 把字符串分割到数组中
 * 21 strrev()	反转字符串
 * 22 wordwrap()
 * 23 str_shuffle() 随机打乱字符
 * 24 parse_str 
 * 25 number_format()
 * 26 strtolower() 
 * 27 strtoupper()
 * 28 ucfirst()
 * 29 ucwords()
 * 30 htmlentitles()
 * 31 htmlspecialchars() 
 * 32 nl2br()
 * 33 strip_tags() 剥去html,xml,php的标签
 * 34 addcslashes() 
 * 35 stripcslashes() 
 * 36 addslashes()
 * 37 stripslashes()
 * 38 quotemeta()
 * 39 chr()
 * 40 ord()
 * 41 strcasecmp()
 * 42 strcmp()
 * 43 strncasecmp()
 * 44 strncmp()
 * 45 strnatcmp()
 * 46 strnatcasecmp();
 * 47 chunk_split();
 * 48 strtok();
 * 49 explode(); 使用一个字符串分割另一个字符串
 * 50 implode()  
 * 51 substr()   截取字符串
 * 52 str_replace() 字符串替换
 * 53 str_ireplace();


*/

function er($param){
    echo "<br>" .$param . "<br>";
}

/*
 数学函数
*/
class MathFuns {
    public function action() {
	 $this->mathfuns();
	 $this->charfuns();
	 $this->arrayfuns();
	 $this->filefuns();
	 $this->uploadfilefuns();
	 $this->datefuns();
         $this->ortherfuns();
	 $this->basicfuns();
    }

    public function basicfuns() {
        //sleep();延迟执行
	//exit();
	//eval(); 按php代码执行字符串
	//die();
	//defined();
	//define();
	//constant();
	//utf8_encode();
	//utf8_decode();
        //trim();
	//substr_replace();
	//substr();
	//strstr();
	//strrpos();
	//strripos();
	//strrev();
	//strpos();
        //strlen();
	//stripos();
	//stristr();
	//stripslashes();
	//stripcslashes();
	//strip_tags();
	//str_word_count();
	//str_split();
	//str_replace();
	//sprintf();
        //sha1_file();
	//sha1();
	//setlocale();


    
    }

    public function ortherfuns() {
        //intval();

    }

    public function uploadfilefuns() {
        //move_uploaded_file();
     
    }

    public function datefuns() {
        //time();
	//mktime();
	//checkdata();
	//date_default_timezone_set();
	//getdate();
	//strtotime();
	//microtime();

    }

    public function filefuns() {
        er("文件函数");
        er(realpath("a.txt"));

        $handle = fopen("a.txt","ab+");
        if($handle) {
	    er("open file ok");
            fclose($handle);
        }

	if(file_exists("a.txt")) {
	    er("a.txt is exists");
	} else {
	    er("a.txt not exists");
	}

        er("a.txt:" . filesize("a.txt"));
        
	if(is_readable("a.txt")) {
	    er("a.txt  可读");
	} else {
	    er("a.txt 不可读");
	}

	if(is_writable("a.txt")) {
	    er("a.txt  可写");
	} else {
            er("a.txt 不可写");
	}
        if(is_executable("a.txt")) {
	    er("a.txt 可执行");
	} else {
	    er("a.txt 不可执行");
	}
	er(filectime("a.txt"));
	er(filemtime("a.txt"));
	er(fileatime("a.txt"));
        var_dump(stat("a.txt"));
	
        $filename = "test.txt";
	$somecontent = "添加这些文字到文件\n";
	$handle = fopen($filename, 'a');
	fwrite($handle,$somecontent);
	sleep(1);
	fclose($handle);
	er("write test.txt ...");

	//fputs == fwrite

	$filename = "test.txt";
	$handle = fopen($filename, 'r');
	$contents = fread($handle,filesize($filename));
	fclose($handle);
        er($contents);


	$file = @fopen("test.txt","r");
	if($file) {
	    while(!feof($file)){
               $buffer = fgets($file,4096);
	       er($buffer);
	       er("kkk");
            }
	    fclose($file);

        }

	//fgetc();
	//file();
	//readfile();
	//file_get_contents();
        //file_put_contents();
	//ftell();
	//fseek();
	//rewind();
	//flock();
	//basename();
	//dirname();
	//pathinfo();
	//opendir();
	//readdir();
	//closedir();
	//rmdir();
	//unlink();
	//copy();
	//rename();

	er("熟练性练习");
        $filename ="test2.txt";
	$file = fopen($filename, 'ab+');
	if($file) {
	    fwrite($file,"ccccasdf\n");
	    fclose($file);
	
	} else {
            er("打开文件错误");
        }

        $file = fopen($filename, "rb+");
	if($file) {
             $content = fread($file, filesize($filename));
             er($content);
        }

        er(dirname($filename));
        er(basename($filename));
	var_dump(pathinfo($filename));
	
	$dir = "ccc";
	if(!file_exists($dir)) {
	    mkdir($dir,"0777");
	} else {
	   er("$dir 已经存在 ");
        }
	

    }


    public function arrayfuns() {
        er("数组函数"); 
	print_r(array_combine(array('a','bb','a'),array("asdfsa",2,"sd")));

        $range = range(0,50,10);
	print_r($range);

	$firstname = "Peter";
	$lastname = "Griffin";
	$age = "39";
	$result = compact("firstname","lastname","age");
	print_r($result);

        $a = array_fill(2,3,"dog");
	print_r($a);

        $a = array('a'=>"cat","b"=>"dog","c"=>"horse","d"=>"cow");
	print_r(array_chunk($a,2));

	$a1 = array("a"=>"a","b"=>"b");
	$a2 = array("b"=>"bb","c"=>"c");
	print_r(array_merge($a1,$a2));

	$a=array(0=>"dog",1=>"cat",2=>"hose",3=>"bird");
	print_r(array_slice($a,1,2));

        $a1 = array(0=>"cat",1=>"dog",2=>"horse");
	$a2 = array(0=>"horse",1=>"dog",2=>"fish");
	er('---');
	print_r(array_diff($a2,$a1));

        //array_intersect();
 
        $a1 = array("a"=>"dog","b"=>"cat","c"=>"horse");
	$array_search = array_search("dog", $a1);
	er("array_search:$array_search");

	//array_splice();
	
	$a = array(0=>"2",1=>"5",2=>"22");
	er(array_sum($a));

	$people = array("Peter", "Joe", "Glenn", "Cleveland");
        if(in_array("Joe", $people)) {
            er("Joe found");
	} else {
	    er("Joe not found");
	}

	//array_key_exists;
	//key();
	//current();
	//next();
	//prev();
	//ned();
	//rest();
	//list();
	$my_array = array("dog","cat","horse");
	list($a,$b,$c) = $my_array;
	er(key($my_array));
        er(current($my_array));
	er(next($my_array));
        er(key($my_array));
	er(prev($my_array));
	er(end($my_array));
	er(reset($my_array));
	er(end($my_array));
        foreach($my_array as $key => $val) {
            echo "$key:$val-";
	}

        $a = array("dog","b","cat","chorse");
	er(array_shift($a));
	var_dump($a);

	//array_unshift();
	//array_push();
	//array_pop();

	shuffle($a);
	var_dump($a);
	er(count($a));

	print_r(array_flip($a));

	//array_values();
	//array_reverse();
	//array_count_values();
	//array_rand();

	var_dump(array_rand($a,1));

	//each();

	$a = array("cat","dog","cat");
	print_r(array_unique($a));

        sort($a);
	er(" ");
	print_r($a);
	rsort($a);
	er("");
	print_r($a);
	
	//asort();
	//arsort();
        //ksort();
	//natsort();
	//natcasesort();


    }

    public function charfuns() {
	er("字符函数");
        $trim = trim("    Hello World!   ");
	er("trim('    Hello World!    '): $trim");

	$rtrim = rtrim("  Hello World!   ");
	er("rtrim('    Hello World!   ':$rtrim");
	$rtrim = rtrim("Hello World! ccc","ccc");
	er("rtrim('Hello World! ccc','ccc'):$rtrim");
        
	$ltrim = ltrim("  Hello World!    ");
	er("ltrim('   Hello World!  '):$ltrim");

	$dirname = dirname("c:/testweb/cc/home.php");
	er("dirname('c:/testweb/cc/home.php'):$dirname");

        $str_pad = str_pad('ccw',20,'*');
	er("str_pad('ccw',20,'*'):$str_pad");
	
	$str_repeat = str_repeat('%',6);
	er("str_split('%',6):$str_repeat");

        $str_split = str_split('hello');
	var_dump($str_split);

        $strrev = strrev("Hello World!");
	er("strrev('Hello World!'):$strrev");

        $wordwrap = wordwrap("An example on a long word is:Superclifragulistic",15);
	er("wordwrap('An example on a long word is :Superclifragulistic',15):$wordwrap");

	$str_shuffle = str_shuffle("ABCDE123456");
	er("str_shuffle('ABCDE123456'):$str_shuffle");

        //$parse_str("id=22&name=John Adams", $myArray);
	//var_dump($myArray);

//	$number_format = number_format(23332000,2,",");
//	er("number_format(222333000,2,','):$number_format");

        $strtolower = strtolower("AABBCCC");
	er("strtolower('AABBCCC'):$strtolower");

        $strtoupper = strtoupper("aabbcc");
	er("strtoupper('aabcc'):$strtoupper");

        //ucwords

	$htmlentities = htmlentities("John & 'Adaams");
	er($htmlentities);
	
	//htmlspecialchars()
	//nl2br()
	
	$strip_tags = strip_tags("hello <b>world!</b>");
	er("strip_tags('hello <b>world!</b>):$strip_tags");
	
        $addcslashes = addcslashes("hello, my name is John adams.", "m");
	er($addcslashes);

        $addcslashe = stripcslashes($addcslashes);
	er($addcslashe);

	er(addslashes("Who's john adams?"));

        er(stripslashes(addslashes("Who's john adams?")));

	er(quotemeta("hello wold.(can you hear me?)"));

	$chr = chr(052);
	er("chr(052):$chr");

	$ord = ord("ess");
	er("ord('ess'):$ord");

	//strcasecmp()
	//strcmp()
	//strncmp();
	//strncmp();
	//strncasecmp();
	//strnatcmp();
	//chunk_split();
	//strtok();
	//

	$explode = explode(",", 'a,dd,dds,23a');
	er("explode(',','a,dd,dds,23a'):");
	var_dump($explode);

        
	$implode = implode(",", array(2,3,2,"asdf","sdf"));
        er($implode);

	$substr = substr("aabbdd",2,2);
	er("substr('aabbdd',2,2'):$substr");
       
        $str_replace = str_replace("cc", "wwww","aa cc dd");
	er("str_replace('cc','wwww','aa cc ee'): $str_replace");
  
        $str_ireplace = str_ireplace("cW", "MMM", "a cw mm");
	er($str_ireplace);

	$substr_count = substr_count("wwc ww ad ww oasd swwasd","ww");
	er($substr_count);

	//$substr_replace(
        
	$similar_text = similar_text("a dasd wosda sdo","2a32 mallllo8o");
	er($similar_text);

	er("strrchar():" . strrchr("xxxx sdfadsfxx sadf","xx"));

        //strstr()
	//strtr()
	er("strpos():" . strpos("abc dd wm " ,"dd"));
	er("stripos():" . stripos("abc dD wm" ,"dd"));
	//strrpos();
	//strripos();
	//strspn();
	//strcspn();

	er("str_word_count('aa ccd mm'):" . str_word_count("aa ccd mm"));

	er("strlen('abc'):" . strlen('abc'));

	er("count_chars('abc234am@#'):" ); 
	var_dump(count_chars('abc234am@#'));

	er("md5('ccd'):" . md5('ccd'));

    }
    public function mathfuns() {
         er("数学函数：");
	 $abs = abs(-4.2);
	 er("abs(-4.2):$abs");
	 
	 $ceil = ceil(9.99);
	 er("ceil(9.99):$ceil");

	 $floor = floor(9.99);
	 er("floor(9.99):$floor");

	 $fmod = fmod(5.7, 1.3);
	 er("fmod(5.7, 1.3):$fmod");
	 
	 $pow = pow(2, 3);
	 er("pow(2, 3):$pow");

	 $round = round(1.95645, 2);
	 er("round(1.95645, 2):$round");

	 $sqrt = sqrt(9);
	 er("sqrt(9):$sqrt");

	 $max = max(1,2,5,7,86,34);
	 er("max(1,2,5,7,86,34):$max");

	 $min = min(array(1,3,44));
	 er(" min(array(1,3,44)):$min");
	 $min = min(2,0.5,33);
	 er(" min(2,0.5,33):$min");
	 
	 $mt_rand = mt_rand(0,9);
	 er("mt_rand(0,9):$mt_rand");
	 $mt_rand = mt_rand(1.23,1.99);
	 er("mt_rand(1.23,1.99):$mt_rand");

	 $rand = rand(1.23, 1.99);
	 er("rand(1.23, 1.99):$rand");
         $rand = rand(1,100);
	 er("rand(1,100):$rand");

	 $pi = pi();
	 er("pi():$pi");


    }
}
$mathFuns = new Mathfuns();
$mathFuns->action();



