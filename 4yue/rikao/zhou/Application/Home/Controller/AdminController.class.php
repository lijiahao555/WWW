<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
	/** 登录页面展示 */
    function admin(){
    	$this->display();
    }
    /** 验证码图片 */
    function Verify(){

		$config =    array(    
		'fontSize'    =>    30,    // 验证码字体大小    
		'length'      =>    3,     // 验证码位数    
		'useNoise'    =>    false, // 关闭验证码杂点
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
		
	}
	/** 登录数据验证 */
	function adminDo(){
		$post=I('post.');
		
		$admin=D('Admin')->findOne($post);
		
		if ($admin=1) {
			$_SESSION['name']=$post['name'];
			$this->success('登录成功',U('Inforshow/show'),2);
		}else if($admin=2){
			$this->success('密码错误',U('Admin/admin'),2);
		}else if($admin=3){
			$this->success('账号错误',U('Admin/admin'),2);
		}else if($admin=4){
			$this->success('验证码错误',U('Admin/admin'),2);
		}
	}
	/** 添加用户 */
	function addOne(){
		$post=I('post.');
		$sql=D('Infor')->addOne($post);
		if ($sql) {
			$this->success('添加成功',U('Inforshow/show'),2);
		}else{
			$this->error('添加失败');
		}
	}


}