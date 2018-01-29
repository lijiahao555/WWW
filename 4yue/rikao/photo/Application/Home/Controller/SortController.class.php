<?php
namespace Home\Controller;
use Think\Controller;
class SortController extends Controller {
	/** 展示添加页面 */
    public function add(){
    	$list=D('Sort')->select();
    	$this->assign('list',$list);
    	$this->display('add');
    }
}