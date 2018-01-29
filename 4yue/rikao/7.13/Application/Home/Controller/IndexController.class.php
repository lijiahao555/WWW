<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
	/** 防非法通过后展示页面*/
    public function show(){

    	$Admin=D('Login');
    	$list=$Admin->show();
        $this->assign('list',$list);
    	$this->display('show');
    }
}