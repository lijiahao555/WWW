<?php
namespace Home\Controller;
use Think\Controller;
class InforController extends CommonController {
	function up(){
		$id=I('get.id');
		$list=D('Infor')->find($id);
		// $infor_hobby=explode(',', $list['infor_hobby']);
		
		// $arr['infor_hobby']=explode(',', $list['infor_hobby']);
		$this->assign('list',$list);
		$this->assign('id',$id);
		$this->display();
	}
	function upOne(){
		$data=I('post.');
		$res=D('Infor')->upOne($data);
		if ($res) {
			$this->success("修改成功",U('Class/show'),2);
		}else{
			$this->error("修改失败",U('Class/show'),2);
		}
	}
}