<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class IndexController extends Controller {
    
    public function index(){
    	$this->display('login');
    }

    public function loginDo(){
    	$name=I('post.name');
    	$pwd=I('post.pwd');
    	$User=M('day19');

    	$sql=$User->where("name='$name'")->select();
    	$res=$User->where("pwd='$pwd'")->select();
    	if ($sql==false) {
    		echo "用户名错误";
    		header('refresh:1;url=./login');die;
    	}
    	if ($res==false) {
    		echo "密码错误";
    		header('refresh:1;url=./login');die;
    	}
    
		echo "登路成功";
		header('refresh:1;url=./show');
		setcookie('name',$name);
	

    }

    public function show(){
    	
    	$this->display('show');
    }

    public function ajax(){
    	$User=M('day19');
    	$sql=$User->select();
    	$this->assign('data',$sql);
    	$this->display('ajax');
    }
                      
    public function del(){
    	$id=I('get.id',0);
    	$User=M('day19');

    	$sql=$User->delete($id);
    	if ($sql==false) {
    		echo 0;die;
    	}
    	$this->ajax();
    }

}