<?php
header('content-type:text/html;charset=utf8');
//token
// $token = 'li';

// //组合数组
// $arr = array($token,$_GET['timestamp'],$_GET['nonce']);

// //排序
// sort($arr);

// //分割成字符串
// $str = implode('', $arr);

// //加密
// $data = sha1($str);

// //相同就给微信服务器返回echostr
// if ($data == $_GET['signature']) {
// 	echo $_GET['echostr'];die;
// }

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
