<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//localhost://
echo "test php ";
var_dump($_GET);
die("ooo");
class testPreg{
    public function test(){
       preg_match('/(foo)(bar)(baz)/','foobarbaz',$matches);
       print_r($matches);  
       
       preg_match('/\bhe\b/','c he sdf',$matches);
       print_r($matches);  
       
       preg_match('/\bhe\b.*\bis\b/',"mm he kasdood sdio , dskf is",$matches);
       print_r($matches);
       
       //匹配开头是a的单词  \w:字母，下划线，数字，汉字
       preg_match('/\ba\w*\b/','actio4545n sdfw ac cds',$matches);
       print_r($matches);
       
       // * 匹配任意次   +匹配1次或多次  \d+:匹配1或多个数字
       preg_match('/\d+/','as3434dfdlasd asdf',$matches);
       print_r($matches);
       
       //   \b\w{6}\b  刚好6个字符的单词
       preg_match('/\b\w{6}/','sssdfa',$matches);
       print_r($matches);
       
       //  0\d\d-\d\d\d\d\d\d\d\d  == 0\d{2}-\d{8}  匹配 010-12345678
       
       // ^: 字符串开始
       // $: 字符串结尾
       // . : 除了换行符以外的任意字符
       preg_match('/^\d{5,11}$/','232323',$matches);
       print_r($matches);
       
       //量词 
       // \d+ 一个或更多个数字
       // \d? 0个或1个数字
       
       // [] 匹配一个字符 
       // [aiue] 匹配a,i,u,e的任意一个
       
       //转义 
       $reg = "#[aby\}]#";
       $str = 'a\bc[]{}';
       preg_match_all($reg,$str,$m);
       var_dump($m);
       
       //反义   \d : \D 
       preg_match('/<a[^>]+>/','<a href="http://www.baidu.com"',$m);
       var_dump($m);
       
       //分支
       $reg = "#0\d{2}-\d{8}|0\d{3}-\d{7}#";
       $str = '010-12345678  0316-1234567';
       preg_match_all($reg,$str,$m);
       var_dump($m);
       
       //分组
       $reg = "#(\d{1,3}\.){3}\d{1,3}#";
       $str = "123.566.1.22";
       preg_match($reg,$str,$m);
       var_dump($m);
       
       //定义组名
       
       //反向引用
       $reg = "#(\"|').*?(\"|')#";
       $str = " \"this is a ' string ' \" ";        
       preg_match($reg,$str,$m);
       print_r($m);
       
       $reg = "#(\"|').*?\1#";
       $str = " \"this is a ' string ' \" ";        
       preg_match($reg,$str,$m);
       print_r($m);
       
       $reg = "#(?P<quote>\"|').*?(?P=quote)#";
       $str = " \"this is a ' string ' \" ";        
       preg_match($reg,$str,$m);
       print_r($m);
       
       //ubb
       $str = '[url]1.jpg[/url][url]2.jpg[/url][url]3.jpg[/url]';
       $s = preg_replace("#\[url\](?<WORD>\d\.jpg)\[\/url\]#","<img src=http://image.ai.com/upload/$1 >",$str);
       var_dump($s);
       
       $str = '[url]1.jpg[/url][url]2.jpg[/url][url]3.jpg[/url]';
       $s = preg_replace("#\[url\](.*?)\[\/url\]#","<img src=http://image.ai.com/upload/$1 >",$str);
       var_dump($s);
       
       //环视  零宽断言
       //1.顺序肯定环视(?=exp)   
       $reg = "#\b\w+(?=ing\b)#";
       $str = "I'm singing while you 're dancing.";
       preg_match_all($reg,$str,$m);
       var_dump($m);
       
       //2.逆序肯定环视(?<exp)
       $reg = "#(?<=\bre)\w+\b#";
       $str = 'reading a book';
       preg_match($reg,$str,$m);
       var_dump($m);
       
       $reg = "#((?<=\d)\d{3})+\b#";
       $str = "1234567890";
       preg_match_all($reg,$str,$m);
       var_dump($m);
       
       //3.顺序否定环视  (?!exp)
       //  \d{3}(?!\d)    \b((?!abc\w)+\b
       
       $reg = "#\b((?!abc)\w)+\b#";
       $str = "cabc abcda dd ccadcd";
       preg_match_all($reg,$str,$m);
       var_dump($m);
       
       //4.顺序否定环视(?<!exp)
       
       
       //贪婪/懒惰匹配
       $reg = "#a.*?b#";
       $str = "accsdabbbbsdfsbbbbab";
       preg_match($reg,$str,$m);
       var_dump($m);
       
       /*   $str = '[url]1.jpg[/url][url]2.jpg[/url][url]3.jpg[/url]';
       $s = preg_replace("#\[url\](.*?)\[\/url\]#","<img src=http://image.ai.com/upload/$1 >",$str);
       var_dump($s);*/
       
       
       $str = '[url]1.jpg[/url][url]2.jpg[/url][url]2.jpg[/url]';
       $s = preg_replace("#\[url\](.*?)\[/url\]#","<img src=httpp:/image/ala.com/uplaod1/$1 />",$str);
       echo "cc:";
       var_dump($s);
       
       // 与，或，非关系
       $reg = "#(?<=<div>)(.*)(?=</div>)#";
       $str = "<div>ggo</div>";
       preg_match($reg,$str,$m);
       var_dump($m);
       
       //非
       $reg = "#<a[^>]*>([^<>|5]*)<\/a>#";
       $str ='<a href-"http://baidu.com">baidu>.com</a>some<a href="sohu.com" >sohu</a>';
       preg_match_all($reg,$str,$m);
       var_dump($m);
       
       $reg ='#</?\b[^>]+>#';// '#</? \b[^>]+>#';
       $reg = "#<(?!/?p\b)[^>]+>#";
       $str = 'ab<p>oneced<div>fgh</div><img src="">';
       preg_match_all($reg,$str,$m);
       var_dump($m);
       
       //常用模式  1.忽略大小写 （i)
       $str = "<div>gG</Div>";
       if(preg_match('#<div>gg<\/div>#i',$str,$arr)){
           echo "oook".$arr[0];
       }else{
           echo " >nott<";
       }
       
       
       //2.多行模式 m
       $str = "this is reg
               Reg 
               this is 
               regexp turtor,oh reg";
       echo "$str";  
       if(preg_match('#.*reg$#mi',$str,$arr)){
           echo "ook";
           var_dump($arr);
       }else{
          echo 'nno';
          var_dump($arr);
       }
       if(preg_match_all('#^.*reg#i',$str,$arr)){
           echo "ook";
           var_dump($arr);
       }else{
          echo 'nno';
          var_dump($arr);
       }  
       
       //3.点号通配模式 s
       $str = "this is reg
               Reg 
               this is 
               regexp turtor,oh reg";
       echo "$str";  
       if(preg_match_all('#this.*?reg#is',$str,$arr)){
           echo "ook";
           var_dump($arr);
       }else{
          echo 'nno';
          var_dump($arr);
       }
       
       //4.懒惰模式 U
       $str = '[url]1.gif[/url][url]2.gif[/url][url]3.gif[/url]';
       $s = preg_replace("#\[url\](.*)\[\/url\]#U","<img src=http://image.com/$1>",$str);
       var_dump($s);
       
       //5.结尾限制符
       //6.支持UTF-8转义表达 u
       $str = "编程";
       if(preg_match("#^[\x{4e00}-\x{9fa5}]+$#u",$str)){
           echo "该字符串全是中文 cccc";
       }else{
           echo "不全是中文 ddd";
       }
       
       //手机
       $mb = '13500000000';
       $regex = '#^(13[4-9]|12[0189]|188)\d{8}$#';
       if(!preg_match($regex,$mb)){
       	echo 'error mb';
       }else{
       	echo 'oook mb ';
       }
       
       //EMAIL
       $mb = '9cc@yhuoo.com.cn';
       $regex = '#^[a-z0-9_\-]+(\.[a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|areo|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)$#';
	   if(!preg_match($regex,$mb)){
	   	echo 'error not host';
	   }else{
	   	echo "oook is host";
	   }
	   
	   //清除html
	   $regex = '#< \/[^>]+>#';
	   $html = '<strong>strong</strong><img src="cc.jpg" />';
	   preg_replace($regex,$html,$m);
	   var_dump($m);
	   
	   $text = '<p>Test paragraph.<!--comment--><a href="#fragment"> oh a </a>';
	   echo strip_tags($text,"p a");
	   	   
	   
    }  
}
$testPreg = new testPreg;
$testPreg->test(); 


   



