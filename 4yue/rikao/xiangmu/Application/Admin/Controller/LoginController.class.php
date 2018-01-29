<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	/** 展示登录页面 */
    public function login(){
        $this->display('login');
    }
    /** 展示注册页面 */
    public function loginAdd(){
    	$this->display();
    }
    /** 操作注册信息 */
    public function addOne(){
    	$data=I('post.');
    	$res=D('Login')->add($data);
    	if ($res) {
    	    	$this->success("添加成功",U('Login/login'),2);
    	}else{
				$this->error("添加失败",U('Login/loginAdd'),2);
    	}
    }
    /** 操作登录信息 */
    public function exam(){
    	$data=I('post.');
    	$res=D('Login')->exam($data);
    	if ($res==0) {
    		$_SESSION['name']=$data['login_name'];
    		if ($data['7']==7) {
    			setcookie('name',$data['login_name'],time()+60*60*24*7,'/');
    		}
    		// session('name',$data['login_name']);
    		$this->success("登录成功",U('Control/control'),2);
    	}else if ($res=1) {
    		$this->error("密码错误",U('Login/login'),2);
    	}else{
    		$this->error("账号错误",U('Login/login'),2);
    	}
    }

    /** 操作管理员信息 */
    public function user(){
        $this->display();
    }
    /** 展示管理员详细信息 */
    public function show(){
        $list=D('User')->selectAll();
        $this->assign('list',$list);
        $this->display();
    }
}