<?php

return array(

		'dbname'             =>'text',		// 数据库,库名称
		'host'               =>'127.0.0.1',	// 主机地址
		'dbuser'             =>'root',		// 数据库账号
		'dbpwd'              =>'root',		// 数据库密码
		'dbtype'             =>'mysql',		// 数据库类型
		'prefix'             =>'',			// 表前缀
		'charset'            =>'utf8',		// 字符集编码

		'default_controller' =>'welcome',	// 默认控制器
		'default_action'     =>'index',		// 默认方法名

		//模板布局
		'layout_on'          =>false,		// false , true
		'layout_html'        =>'layout'		// 引用模板文件的名称
	);