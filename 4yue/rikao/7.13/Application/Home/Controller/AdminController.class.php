<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
    /**  展示登录页面 */
    public function admin(){
    	$this->display('admin');
    }
     /** 接收传过来的账号密码 去防非法验证 */
     public function adminDo(){
        $post=I('post.');
        $name=I('post.name');
    	$box=I('post.box','');
    	$Admin=D('Login');
    	$sql=$Admin->exam($post);
        
    	if ($sql==1) {
    		$this->error('用户名错误');
    	}else if($sql==2){
    		$this->error('密码错误');
    	}else{
                $_SESSION['name']=$name;
            if ($box==7) {
                setcookie('name',$name,time()+60*60*24*7,'/');   
            }
    		$this->success('登录成功',U('Home/Index/show'),2);
    	}// 名 值 过期时间 作用域
    }
}