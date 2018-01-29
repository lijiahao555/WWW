<?php 
	header('content-type:text/html;charset=utf8');
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$rpwd=$_POST['rpwd'];
	$age=$_POST['age'];
	$data=$_POST['data'];



	//连接数据库
	mysql_connect('127.0.0.1','root','0509');
	//选择表
	mysql_select_db('demo');
	//设置字符集
	mysql_query('set names utf8');
	//sql语句
	$sql="insert into demo values(null,'$username','$pwd','$rpwd','$age','$data')";
	//执行SQL语句	

	

	if (mysql_query($sql)) {
		//echo "<a herf='show.php'>添加成功</a>";
		header('location:show.php');
	}else{
		echo "添加失败";
	};


 ?>
 