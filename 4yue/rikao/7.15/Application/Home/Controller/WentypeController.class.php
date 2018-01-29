<?php
namespace Home\Controller;
use Think\Controller;
class WentypeController extends Controller {
   	/**
	 *  动态读取分类数据  展示数据添加页面
	 */
   public function add(){
   		$list=D('Wentype')->select();
   		$this->assign('list',$list);
   		$this->display('add');
   }
}