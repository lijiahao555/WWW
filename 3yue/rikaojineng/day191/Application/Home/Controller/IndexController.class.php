<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function login(){
    	$this->display('login');
    }
    public function entry(){
    	$config =    array(    'fontSize'    =>    30,    // 验证码字体大小    
    	'length'      =>    3,     // 验证码位数    
    	'useNoise'    =>    false, // 关闭验证码杂点);
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();

 	}

 	public function sub(){
 		$name=I('get.name');

 		$pwd=I('get.pwd');
 		$User = M("login"); // 实例化User对象// 查找status值为1name值为think的用户数据 
 		$sql=$User->where("name='$name'")->find();
 		if (!$sql) {
 			echo 2;die;
 		}

 		if ($sql['pwd']!=$pwd) {
 			echo 3;die;
 		}

 		$xiao=I('get.xiao');
 		$verify = new \Think\Verify();    
 	
 		$x=$verify->check($xiao);
 		if (!$x) {
 			echo 1;die;
 		}
        cookie('name',$name);
 	}

}
?>