<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	function __construct(){
		parent::__construct();
		//原生的
		// $c=$_COOKIE['name'];
		// $s=$_SESSION['name'];

		$c=cookie('name');
		$s=session('name');
		// echo $c.$s;die;
		if (!empty($c)&&empty($s)) {
			session('name',$c);
			$s=session('name');
		}
		// var_dump($s);die;
 		if (empty($_SESSION['name'])) {
			$this->error("请先登录",U('Login/admin'));
			die;
		}
	}
	
}