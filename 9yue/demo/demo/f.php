<?php

$url='http://www.sina.com.cn/abc/de/fg.html?id=1&a=c&t=12';



echo getExt($url);

echo "<br/>";
function getExt($url){

    $arr=parse_url($url);

   //  //方法一、
   //  $name=basename($arr['path']);
  	// $extArr=explode('.',$name);
   //  return $extArr[1];
   	//方法二、
    $path=$arr['path'];
  	$str=strrchr($path,'.');
    return $str;

    
    $pathArr=pathinfo($url);

   	$str = $pathArr['extension'];
    list($type, $vars) = explode('?',$str);

    return $type;
}