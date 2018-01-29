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
      $sousuo=I('get.sousuo');
      if ($sousuo=='') {
        $where="";
      }else{
        $where="name like '$sousuo'";
      }
      $h=I('get.h');
      echo $h;die;
   		 $p=I('get.p',1);
   		 $list=D('Infor')->ajax($p,$where);
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
    /** 添加说说列表 */
    function add(){
      $data=D('Type')->selectMany();
      $this->assign('data',$data);
      $this->display();
    }
    /** 验证码 */
    function Verify(){

    $config =    array(    
    'fontSize'    =>    30,    // 验证码字体大小    
    'length'      =>    3,     // 验证码位数    
    'useNoise'    =>    false, // 关闭验证码杂点
    );
    $Verify =     new \Think\Verify($config);
    $Verify->entry();
    
  }
    /** 处理添加说说 */
    function addOne(){
      $data=I('post.');
      $exam=$data['exam'];
      $verify = new \Think\Verify();    
      $exam_exam=$verify->check($exam);
      if (!$exam_exam) {
        $this->error("验证码不正确",U('Inforshow/add'),2);
      }
      $res=D('Infor')->addtwo($data);
      if ($res!=false) {
          $this->success("添加成功",U('Inforshow/show'),2);
      }else{
        $this->error("添加失败",U('Inforshow/add'),2);
      }

    }
   
}