 <?php 	
 //echo "<script>alert('123456');location.href='demo1.html'</script>";
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$rpwd=$_POST['rpwd'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$city=$_POST['city'];
$tel=$_POST['tel'];
$tell=$_POST['tell'];
$crad=$_POST['crad'];
$qq=$_POST['qq'];
$desc=$_POST['desc'];




$c_name="/^[a-z][0-9a-z]{4,9}$/i";
if (preg_match($c_name, $name)==0) {
	echo "<script>alert('用户名错误');location.href='demo1.html'</script>";die;
	//echo "用户账号错误";die;
};


$c_pwd="/^[a-z][0-9a-z]{4,9}$/i";
if (preg_match($c_pwd, $pwd)==0) {
	echo "<script>alert('密码错误');location.href='demo1.html'</script>";die;
	//echo "用户密码错误";die;
}

if ($rpwd !=$pwd) {
	echo "<script>alert('确认密码错误');location.href='demo1.html'</script>";die;
	//echo "确认密码错误";die;
}


if (empty($_POST['sex'])) {
	echo "<script>alert('性别必须选');location.href='demo1.html'</script>";die;
	//echo "用户密码错误";die;
}

$c_email="/^[0-9]{4,10}[@]qq[.]com|[0-9]{4,10}[.]cn|[0-9]{4,10}[.]net$/";
if (preg_match($c_email, $email)==0) {
	echo "<script>alert('邮箱错误');location.href='demo1.html'</script>";die;
	//echo "用户密码错误";die;
}

if (empty($_POST['city'])) {
	echo "<script>alert('城市必须选');location.href='demo1.html'</script>";die;
	//echo "用户密码错误";die;
}

$c_tel="/^1[358]\d{9}$/";
if (preg_match($c_tel, $tel)==0) {
	echo "<script>alert('手机号错误');location.href='demo1.html'</script>";die;
	//echo "用户密码错误";die;
}

$c_tell="/^\d{3}-\d{8}$/";
if (preg_match($c_tell, $tell)==0) {
	echo "<script>alert('座机错误');location.href='demo1.html'</script>";die;
	//echo "用户密码错误";die;
}

$c_crad="/^(\d{15}|\d{17}x)$/i";
if (preg_match($c_crad, $crad)==0) {
	echo "<script>alert('密码错误');location.href='demo1.html'</script>";die;
	//echo "用户密码错误";die;
}

$c_qq="/^\d{8,11}$/";
if (preg_match($c_qq, $qq)==0) {
	echo "<script>alert('密码错误');location.href='demo1.html'</script>";die;
	//echo "用户密码错误";die;
}
//PHP中文正则需要{}包起来
$c_desc="/^[\x{4e00}-\x{9fa5}]$/i";
if (preg_match($c_desc, $desc)==0) {
	echo "<script>alert('密码错误');location.href='demo1.html'</script>";die;
	//echo "用户密码错误";die;
}
mysql_connect('')

?>