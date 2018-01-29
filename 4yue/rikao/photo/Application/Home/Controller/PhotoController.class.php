<?php
namespace Home\Controller;
use Think\Controller;
class PhotoController extends Controller {
	/** 添加一条数据 */
    public function addOne(){
    	$data=I('post.');
    	$Photo=D('Photo')->addOne($data);
    	if ($Photo==1) {
    		$this->success('添加成功',U('Photo/show'),2);
    	}else{
    		$this->error('添加失败',U('Sort/add'),2);

    	}
    }
    /** 展示数据页面 */
    public function show(){

    	$this->display('show');
    }
    function ajax(){

    	$list=D('Photo')->select();
    	// $this->assign('list',$list);
    	$arr['list']=$list;

    	// echo json_encode($arr);
    	$this->ajaxReturn($arr,'json');

    }
}