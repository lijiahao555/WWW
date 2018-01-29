<?php 
//接值
$xiazai=$_GET['xiazai'];
//起名
$name=substr($xiazai, strrpos($xiazai,"/")+1);
//写文件类型
header('Content-type:image/jpg');
//激活下载窗口
header("Content-Disposition:attachment;filename=$name");
//读文件
readfile("$xiazai");


?>
