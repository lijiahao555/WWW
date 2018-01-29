<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
	/** 
	*展示登录页面
	*/
	public function login(){
		$this->display('login');
	}
	/** 
	*=注册接值  成功跳转登录页面
	*/
	public function loginDo(){
		$post=I('post.');
		$Admin=D('Login');
		$sql=$Admin->login($post);
		if ($sql) {
			$this->success('成功',U('Home/Login/admin'),2);
		}else{
			$this->error('失败');
		}
	}
}