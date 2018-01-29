<?php
namespace Home\Controller;
use Think\Controller;
class BookController extends Controller {
	/** 添加页面 */
    function add(){
    	$this->display();
    }
    /** 处理添加图书数据 */
    function addDo(){
    	$data=I('post.');
    	$res=D('Book')->addOne($data);
    	if ($res) {
    		$this->success("成功",U('Book/show'),0);
    	}else{
    		$this->error("失败",U('Book/add'),0);
    	}
    }
    /** 展示图书信息 */
    function show(){
    	$list=D('Book')->selectAll();
    	$this->assign('list',$list);
    	$this->display();
    }



}