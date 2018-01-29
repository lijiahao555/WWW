<?php 
	header('content-type:text/html;charset=utf8');
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$rpwd=$_POST['rpwd'];
	$sex=$_POST['sex'];
	$data=$_POST['data'];
	
	//连接数据库
	
	mysql_connect('127.0.0.1','root','0509');
	//选择数据库
	mysql_select_db('1511phpc');
	//设置字符集
	mysql_query('set names utf8');
	//拼写sql语句
	$sql = "insert into infor values(null,'$username','$pwd','$rpwd','$sex','$data')";
	$res=mysql_query($sql);
	
	if ($res) {
		//php 添加页面
		//echo "<a href='demo.php'>天假称工</a>";
		//超链接跳转
		//header（可以从第一页面跳转第三页面）
		header('location:admin.php');
	}else{
		echo ("天假失败");
	};

 ?>
