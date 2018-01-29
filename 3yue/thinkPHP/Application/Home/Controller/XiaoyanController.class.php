<?php
namespace Home\Controller;
use Think\Controller;
class XiaoyanController extends Controller{
	public function add(){
		$this->display();
	}
	public function evrify(){
		$config =    array(    'fontSize'    =>    100,    // 验证码字体大小    
		'length'      =>    2,     // 验证码位数    
		'useNoise'    =>    true, // 关闭验证码杂点);
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}
	public function addDo(){
		$xiao=I('post.xiaoyan');
		// echo $xiao;die;
		$verify = new \Think\Verify();
		$res=$verify->check($xiao);
		var_dump($res);
	}




}
?>