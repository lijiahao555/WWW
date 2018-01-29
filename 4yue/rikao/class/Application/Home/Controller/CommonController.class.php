<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    /** 处理非法登录 */
    function __construct(){
    	parent::__construct();
    	$session=$_SESSION['name'];
    	$cookie=$_COOKIE['name'];
    	if (!empty($cookie) && empty($session)) {
    		session('name',$cookie);
    		// $session=$_SESSION['name'];
    	}
    	if (empty($_SESSION['name'])) {
    		$this->error("请先登录",U('Admin/admin'),2);die;
    	}
    	
    }
}