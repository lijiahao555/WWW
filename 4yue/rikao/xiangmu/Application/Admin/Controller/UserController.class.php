<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
	/** 展示用户信息添加 */
    public function user(){
    	$this->display();
    }
    /** 展示用户信息信息 */
    public function show(){
        $list=D('User')->selectAll();
        $this->assign('list',$list);
    	$this->display();
    }
    /** 添加用户信息 */
    function userOne(){
        $data=I('post.');
        print_r($data);
    }

}