<?php 
header('content-type:text/html;charset=utf8');
require('date.php');
$name=$_POST['name'];
$number=$_POST['number'];
$class=$_POST['class'];
$sex=$_POST['sex'];
$count=$_POST['count'];
$box=implode(',', $_POST['box']);
require('add_zz.php');
$db=new Exam();
if (!$db->ck($name)) {
	echo "用户名输入错误";die;
}

$db=new Db('127.0.0.1','root','0509','day3');
$arr=array('name'=>$name,'number'=>$number,'class'=>$class,'sex'=>$sex,'box'=>$box,'count'=>$count);

if ($db->add('day2',$arr)) {
	echo "<a href='add_date_db.php'>添加成功</a>";
}else{
	echo "<a href='add.html'>添加失败</a>";
}
 ?>
