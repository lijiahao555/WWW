<?php 
class Login{

	public function index(){
		require(MVC_Admin_View.'form.php');
	}

	public function loginDo(){
		$name=$_POST['name'];
		$pwd=$_POST['pwd'];

		require(MVC_Admin_Model.'adminModel.php');
		$admindb=new AdminModel();
		$data=$admindb->getAdminOne($name);
		if ($data!=false) {
			if ($data['pwd']==$pwd) {
				setcookie('name',$name);
				echo "登录成功，跳转中。。。";
				header('refresh:3;url=./index.php?p=admin&c=Show&a=index');
				
			}else{
				echo "密码不正确，跳转中。。。";
				header('refresh:3;url=./index.php?p=admin&c=login&a=index');
				return false;

			}

		}else{
			echo "用户名不正确，跳转中。。。";
			header('refresh:3;url=./index.php?p=admin&c=login&a=index');
				return false;
		}



	}

}

 ?>