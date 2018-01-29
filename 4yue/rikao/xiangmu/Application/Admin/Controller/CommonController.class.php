<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
	function __construct(){
		parent::__construct();
		$session=$_SESSION['name'];
		$cookie=$_COOKIE['name'];
		if (!empty($cookie)&&empty($session)) {
			$_SESSION['name']=$cookie;
		}
		if (empty($_SESSION['name'])) {
			$this->success("请先登录",U('Login/login'),2);
			die;
		}

	}
}