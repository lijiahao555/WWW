<?php
namespace Home\Controller;
use Think\Controller;
class InforController extends Controller {
      /** 未登录前页面展示 */
   	public function show(){
   		$list=D('Infor')->selectAll();
   		$this->assign('list',$list);
   		$this->display();
   	}
      /** 分页输出 */
   	function ajax(){
   		 $p=I('get.p',1);
       $h=I('get.h');
   		 $list=D('Infor')->ajax($p,$h);
          $this->assign('list',$list);
          $this->display();
   	}
}