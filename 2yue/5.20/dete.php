<?php 
header('content-type:text/html;charset=utf8');
$username=$_POST['username'];
$sex=$_POST['sex'];
$month=$_POST['month'];
$card=$_POST['card'];
$file=$_FILES;
$tel=$_POST['tel'];
$email=$_POST['email'];
$xueli=$_POST['xueli'];
$school=$_POST['school'];
$time=$_POST['time'];
$box=implode('，', $_POST['box']);


// $c_username="/^[\x{4e00}-\x{9fa5}]{2,4}$/";
// if (preg_match($c_username,$username)) {
// 	echo "<script>alert('用户名错误');location.href='demo.html'</script>";die;
// }

if (empty($sex)) {
	echo "<script>alert('性别必须选');location.href='demo.html'</script>";die;
}

$c_month="/^\d{4}-\d{2}-\d{2}$/";
if (preg_match($c_month, $month)==0) {
	echo "<script>alert('出生年月必须填');location.href='demo.html'</script>";die;
}

$c_card="/^(\d{15}|\d{18}|\d{17}x)$/i";
if (preg_match($c_card,$card) == 0) {
	echo "<script>alert('身份证必须填');location.href='demo.html'</script>";die;
}


if (empty($file)) {
	echo "<script>alert('图片没有上传');location.href='demo.html'</script>";die;
}

$c_tel="/^1[1875]\d{9}$/";
if (preg_match($c_tel,$tel) == 0) {
	echo "<script>alert('电话错误');location.href='demo.html'</script>";die;
}

$c_email="/^\d{5,11}@(qq.com|.cn|.net)$/";
if (preg_match($c_email,$email) == 0) {
	echo "<script>alert('邮箱格式错误');location.href='demo.html'</script>";die;
}


if (empty($xueli)) {
	echo "<script>alert('学历不能为空');location.href='demo.html'</script>";die;
}

$c_school="/^[\x{4e00}-\x{9fa5}]{1,20}$/u";
if (preg_match($c_school,$school) == 0) {
	echo "<script>alert('学校错误');location.href='demo.html'</script>";die;
}

$c_time="/^\d{4}-\d{2}-\d{2}$/i";
if (preg_match($c_time,$time) == 0) {
	echo "<script>alert('时间错误');location.href='demo.html'</script>";die;
}

if (empty($box)) {
	echo "<script>alert('多选错误');location.href='demo.html'</script>";die;
}

if ($file['touxiang']['error']==0) {
	$file_name=time().rand(0,20000);
	$houzhui=substr($file['touxiang']['name'], strrpos($file['touxiang']['name'], '.'));
	$team='./img/'.$file_name.$houzhui;
	if (!file_exists('./img')) {
		mkdir('./img/',0777);
	}
	move_uploaded_file($file['touxiang']['tmp_name'], $team);

// if ($file['touxiang']['error']==0) {
// 	//起文件名，保持唯一性。
// 	$file_name=time().rand(0,20000);
// 	$houzhui=substr($file['touxiang']['name'], strrpos($file['touxiang']['name'],'.'));
	
// 	//选择文件路径加名字.后缀
// 	$team='./img/'.$file_name.$houzhui;

// 	//创建文件夹  第一参数文件夹名字，第二参数权限 ,第三个参数（如果包含子目录，true不写创建不成功）
// 	//mkdir('./img/',0777, true);
// 	//判断一个路径 返回true文件夹存在，false文件不存在
// 	if (!file_exists('./img')) {
// 		mkdir('./img/',0777);
// 	}
// 	move_uploaded_file($file['touxiang']['tmp_name'] , $team);
	
	mysql_connect('127.0.0.1','root','0509');
	mysql_select_db('exam');
	mysql_query('set names utf8');
	$sql="insert into demo2 values(null,'$username','$sex','$month','$card','$team','$tel','$email','$xueli','$school','$time','$box')";
	echo $sql;die;
	if (mysql_query($sql)) {
		header('location:show.php');
	}else{
		echo "<script>alert('添加失败');location.href='demo.html'</script>";
	}


}else{
	echo "<script>alert('添加失败');location.href='demo.html'</script>";
}

 ?>