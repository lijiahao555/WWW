<?php

/**
 * 入口文件
 */

header('content-type:text/html;charset=utf-8');	// 字符集编码

session_start();								// 开启session

define('ROOT_DIR', dirname(__FILE__));			// 定义项目根目录常量

include ROOT_DIR.'/lib/controller.php';			// 引用C层文件

$mvc = new controller();						// 实例化类

$mvc->init();									// 调用init方法
