<?php 
header('content-type:text/html;charset=utf8');
require('class.php');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$db=new Db('127.0.0.1','root','0509','day3');


$res=$db->select('*','day3',"name='$name'");
if ($res) {
foreach ($res as $key => $v) {
		if ($v['pwd']==$pwd) {
		echo "<script>alert('登录成功，返回展示页面');location.href='day3_show.php'</script>";
		}else{
			echo "<script>alert('密码错误，返回登录页面');location.href='day3_login.php'</script>";
		}
	}
}else{
	 	echo "<script>alert('用户名错误，返回登录页面');location.href='day3_login.php'</script>";

}
	
// 	if ($res['pwd']==$pwd) {
// 		echo "11";
// 	}else{
// 		echo "2";
// 	}
	
// }else{
// 	 	echo "3";

// }




 ?>