<?php
namespace Home\Controller;
use Think\Controller;
class BigController extends Controller {
   /**
    * 添加大事件数据
    */
   public function data(){
   		$data=I('post.');
   		$list=D('Big')->addOne($data);
   		if ($list) {
   			$this->success('添加成功',U('/Home/Big/show'),2);
   		}else{
   			$this->error('添加失败',U('/Home/Type/form'),2);
   		}
   }
   /**
    * 展示大事件数据
    */
   public function show(){
   		$list=D('Big')->sel();
   		$this->assign('list',$list);
   		$this->display('show');
   }
   /**
    * 删除大事件数据
    */
   public function del(){
      $id=I('get.id');
      $del=D('Big')->delOne($id);
      if ($del) {
         $this->success('删除成功',U('/Home/Big/show'),2);
      }else{
         $this->error('删除失败',U('/Home/Big/show'),2);
      }
   }
   /**
    * 修改大数据页面
    */
   public function up(){
       $id=I('get.id');
       $this->assign('id',$id);
       $this->display('up');
   }
   /**
    * 修改大事件数据方法
    */
   public function upDo(){
      $id=I('post.');
      $up=D('Big')->upOne($id);
      if ($up) {
         $this->success('修改成功',U('/Home/Big/show'),2);
      }else{
         $this->error('修改失败',U('/Home/Big/show'),2);
      }
   }
   /**
    * 搜索大数据内容
    */
   public function sou(){
      $sou=I('post.sou','');
      
      $list=D('Big')->souAll($sou);
      $this->assign('list',$list);
      $this->display('sou');
   }
}