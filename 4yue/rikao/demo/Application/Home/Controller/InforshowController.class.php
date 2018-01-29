<?php
namespace Home\Controller;
use Think\Controller;
class InforshowController extends CommonController {
  /**  展示登录叶面 */
	function show(){
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
       
   		
   		 $list=D('Infor')->ajax($p);
          $this->assign('list',$list);
          $this->display();
   	}
   	/** 处理赞 */
   	function zan(){
   		$zanid=I('get.zan');
       if(empty($_SESSION['name'])){
        $this->success("请先登录",U('Admin/admin'),2);
        die;
      }
   		$name=$_SESSION['name'];
     
		  $id=D('Admin')->find($name);
   		$res=D('Zan')->add($zanid,$id);
   		echo $res;die;
   	}
    /** 添加一条说说 */
    function add(){
      $data=D('type')->selectMany();
      $this->assign('data',$data);
      $this->display();
    }
    function addOne(){
      $data=I('post.');
      $res=D('infor')->addOne($data);
      if ($res) {
        $this->success('成功',U('Inforshow/show'),2);
      }else{
        $this->error('失败',U('Inforshow/add'),2);
      }
    }
    function addTwo(){
      $data=I('post.');
      $res=D('infor')->addTwo($data);
      if ($res) {
        $this->success('成功',U('Inforshow/show'),2);
      }else{
        $this->error('失败',U('Inforshow/add'),2);
      }
    }

}