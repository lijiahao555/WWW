<?php
namespace Home\Controller;
use Think\Controller;
class TypeController extends Controller {
	/**
	 * form  添加大事件页面
	 */
   public function form(){
   	$list=D('Type')->selectAll();
   	$this->assign('list',$list);
   	$this->display('form');
   }
}