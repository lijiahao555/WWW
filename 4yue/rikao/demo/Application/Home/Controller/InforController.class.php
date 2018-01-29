<?php
namespace Home\Controller;
use Think\Controller;
class InforController extends Controller {
      /** 未登录前页面展示 */
   	public function show(){
   	$data=D('Type')->selectMany();
    $name=$_SESSION['name'];
    $id=D('Admin')->find($name);

    $list=D('Infor')->selectAll();
      $this->assign('list',$list);
      $this->assign('data',$data);
      $this->display();
   	}
      /** 分页输出 */
   	function ajax(){
   		 $p=I('get.p',1);
       $h=I('get.h');
       $id=I('get.id');
        $sou=I('get.sou','');
        if ($sou=='') {
          $where="1";
        }else{
          $where="name like '%$sou%'";
        }
   		 $list=D('Infor')->ajax($p,$h,$where,$id);
          $this->assign('list',$list);
          $this->display();
   	}
}