<?php
namespace Home\Controller;
use Think\Controller;
class WenController extends Controller {

   /**
    * 添加数据
    */
   public function addDo(){
   		$data=I('post.');
   		$list=D('Wen')->addOne($data);
   		if ($list) {
   			$this->success('添加成功',U('/Home/Wen/show'),2);
   		}else{
   			$this->error('添加失败',U('/Home/Wen/add'),2);
   		}
   }
   /**
    * 展示数据方法
    */
   function show(){
   		$list=D('Wen')->select();
   		$this->assign('list',$list);
   		$this->display('show');
   }
   /**
    * [del ]  删除页面
    * @param  [type] $id 传值ID
    * @return [type]     删除后数据
    */
   function del($id){
   		$delete=D('Wen')->delOne($id);
   		if ($delete) {
   			$this->success('删除成功',U('/Home/Wen/show'),2);
   		}else{
   			$this->error('删除失败',U('/Home/Wen/add'),2);
   		}
   }
   /**
    * [up description]  修改页面 
    * @param  [type] $id [description] 接到要修改的哪条
    * @return [type]     [description]  返回修改前数据
    */
   public function up($id){
   		$wen=D('Wen')->findOne($id);
   		
		  $wentype=D('Wentype')->select($id);

   		$this->assign('wen',$wen);
   		$this->assign('wentype',$wentype);
   		$this->display('up');
   }

   /**
    * [upOne description]  修改方法 接到修改的值去修改
    * @return [type] [description] 返回修改成功几条数据
    */
    function upOne(){
    	$post=I('post.');
   		$up=D('Wen')->upOne($post);
   		if ($up) {
   			$this->success('修改成功',U('/Home/Wen/show'),2);
   		}else{
   			$this->error('修改失败',U('/Home/Wen/add'),2);
   		}
   }	
   /**
    * [sou description]  搜索方法 
    * @return [type] [description] 返回查询到的搜索数据
    */
   function sou(){
   		$sou=I('post.sou','');
   		$data=D('Wen')->sousuo($sou);
   		$this->assign('data',$data);
   		$this->display('sou');
   }

}