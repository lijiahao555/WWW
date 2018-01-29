<?php
namespace Admin\Controller;
use Think\Controller;
class TypeController extends CommonController {
	/** 展示分类添加 */
    public function type(){
    	$this->display();
    }
    /** 展示分类列表 */
    public function show(){
    	$data=D('Type')->select();
    	$this->assign('list',$data);
    	$this->display();
    }
    /** 添加分类操作 */
    public function addOne(){
    	$data=I('post.');
    	$res=D('Type')->addOne($data);
    	if ($res) {
    		$this->success('添加成功',U('Type/type'),2);
    	}else{
    		$this->error('添加失败',U('Type/type'),2);
    	}

    }

}