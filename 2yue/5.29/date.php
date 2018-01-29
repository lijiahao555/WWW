<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$rpwd=$_POST['rpwd'];
$card=$_POST['card'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$count=$_POST['count'];

$z_name="/^[a-z]{6,10}$/i";
if (preg_match($z_name,$name)==0) {

	echo "<script>alert('6-10位字母组成，开头不能是数字或者2-3位中文组成');location.href='demo.html'</script>";die;
}

$z_pwd="/^[a-z]\w{6,}$/i";
if (preg_match($z_name,$name)==0) {

	echo "<script>alert('密码不正确');location.href='demo.html'</script>";die;
}


if ($rpwd!=$pwd) {

	echo "<script>alert('密码不一致');location.href='demo.html'</script>";die;
}


$z_card="/^(\d{18}|\d{17}[a-z])$/i";
if (preg_match($z_card,$card)==0) {
	echo "<script>alert('身份证号必须为18位或者17位加X');location.href='demo.html'</script>";die;
}


$z_tel="/^1[358]\d{9}$/";
if (preg_match($z_tel,$tel)==0) {

	echo "<script>alert('必须是13或15或18开头的11位数字');location.href='demo.html'</script>";die;
}


$z_email="/^\d{3,13}@qq.com$/";
if (preg_match($z_email,$email)==0) {

	echo "<script>alert('正确的QQ邮箱');location.href='demo.html'</script>";die;
}

$z_count="/^[\x{4e00}-\x{9fa5}]{1,20}$/u";
if (preg_match($z_count,$count)==0) {
	echo "<script>alert('不能为空，20个字以内');location.href='demo.html'</script>";die;
}




$file=$_FILES;
if ($file['file']['error']==0) {
	$file_name=time().rand(0,2000);
	$houzhui=substr($file['file']['name'], strrpos($file['file']['name'], '.'));
	$team='./img/'.$file_name.$houzhui;
}
	if (!file_exists('./img')) {
		mkdir('./img/',0777);
	}
move_uploaded_file($file['file']['tmp_name'],$team);

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="insert into demo3 values(null,'$name','$pwd','$rpwd','$team','$card','$email','$tel','$count')";

if (mysql_query($sql)) {
	echo "<script>alert('添加成功，进入登录页面');location.href='show.html'</script>";
}else{
	echo "<script>alert('添加失败，返回添加页面');location.href='demo.html'</script>";
}

 ?>