<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	function __construct(){
		parent::__construct();
		$session=$_SESSION['name'];
		if (empty($session)) {
			$this->success('请先登录',U('Admin/admin'),2);
			die;
		}
	}
}