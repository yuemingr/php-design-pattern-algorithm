<?php
header("Content-type:text/html; charset=UTF-8");
/* *
 * 功能：创蓝发送变量短信DEMO
 * 版本：1.3
 * 日期：2017-04-12
 * 说明：
 * 以下代码只是为了方便客户测试而提供的样例代码，客户可以根据自己网站的需要，按照技术文档自行编写,并非一定要使用该代码。
 * 该代码仅供学习和研究创蓝接口使用，只是提供一个参考。
 */
require_once 'ChuanglanSmsHelper/ChuanglanSmsApi.php';
$clapi  = new ChuanglanSmsApi();
$msg = '【253云通讯】{$var},你好！,请你于{$var}日参加活动';
$params = '18721755342,李先生,2017-04-12;18721755342,王先生,2017-04-12';
$result = $clapi->sendVariableSMS($msg, $params);

if(!is_null(json_decode($result))){
	
	$output=json_decode($result,true);
	if(isset($output['code'])  && $output['code']=='0'){
		echo '短信发送成功！' ;
	}else{
		echo $output['errorMsg'];
	}
}else{
		echo $result;
}