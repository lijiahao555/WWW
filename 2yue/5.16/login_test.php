<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="select * from test where name='$name'";

$res=mysql_query($sql);
$arr=mysql_fetch_assoc($res);
if ($arr==0) {
	echo "<script>alert('账号不正确');location.href='login.php'</script>";die;
	//echo "账号不正确";die;
}
if ($arr['pwd']!=$pwd) {
	echo "<script>alert('密码不正确');location.href='login.php'</script>";die;
	//echo "密码不正确";die;
}
if (empty($_POST['box'])==1) {
	setcookie('name',$name,time()+60*60*24*7);
}else{
	setcookie('name',$name);
}
header('location:login_test_show.php');
	 





 ?>