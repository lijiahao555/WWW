<?php 
class Login{
	function index(){
		//调用视图里的登录页面
		require(MVC_Admin_View.'form.php');
	}

	function indexDo(){
		//接值
		$name=$_POST['name'];
		$pwd=$_POST['pwd'];
		//连接模型里的处理数据库的文件
		require(MVC_Admin_Model.'dateModel.php');
		//实例化继承的类
		$m=new Date();
		//调用里面的方法，把用户名传进去
		$sql=$m->getAdminOne($name);
		if ($sql!=false) {
			if ($sql['pwd']==$pwd) {
				setcookie('name',$name);
				echo "登陆成功，正在跳转....";
				header("refresh:3;url='./index.php?p=admin&c=Show&a=index'");
			}else{
				echo "密码错误，正在跳转....";
				header("refresh:3;url='./index.php?p=admin&c=Login&a=index'");
			}
		}else{
			echo "用户名错误，正在跳转....";
			header("refresh:3;url='./index.php?p=admin&c=Login&a=index'");
		}


	}

}

 ?>