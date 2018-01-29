<?php 
//接值
$xiazai=$_GET['xiazai'];
//接文件的名字
$name = substr($xiazai,strrpos($xiazai,"/")+1);
//文件类型
header('Content-type:image/jpg');
//激活一个下载窗口
header("Content-Disposition:attachment;filename=$name");

//读文件
readfile("$xiazai");


