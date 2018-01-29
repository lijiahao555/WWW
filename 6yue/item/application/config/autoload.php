<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('database','session');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array('Common_model');

// function success($msg,$url){
// 	echo "<script>alert('".$msg."');location.href='".site_url($url)."'</script>";die;
// }

function dump($infor){
	echo "<pre>";
	var_dump($infor);
}

/**
 * [success 执行提示跳转]
 * @param  string $content [提示信息]
 * @param  string $url     [跳转地址 默认返回上一个页面]
 * @return [type]          [null]
 */
function success($content='',$url='')
{
	$skip = "<script>";

	if ($content!=''){
		$skip .= "alert('".$content."');";
	}


	if ($url!='')
	{
		$skip .= "location.href='".site_url($url)."';";
	}
	else
	{
		$skip .= "history.back();";
	}

	$skip .= "</script>";

	echo $skip;
}
/**
 * [get_pages 分页]
 * @param  [type] $obj   [$this]
 * @param  [type] $site  [每页显示量]
 * @param  [type] $count [总条数]
 * @param  [type] $url   [跳转地址]
 * @return [type]        [页码]
 */
// function get_page($obj,$site,$count,$url)
// {
// 	$config['base_url'] = site_url($url);


// 	$config['page_query_string'] = TRUE;


// 	$config['total_rows'] = $count;


// 	$config['per_page'] = $site;


// 	$config['first_link'] = '首页';


// 	$config['prev_link'] = '上一页';


// 	$config['next_link'] = '下一页';


// 	$config['last_link'] = '末页';




// 	$obj->pagination->initialize($config);


// 	$page = $obj->pagination->create_links();


// 	return $page;


// }
