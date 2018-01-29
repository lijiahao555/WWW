<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home/User_model','login');
	}
	/** 展示前台用户登录 */
	public function login(){
		$this->load->view('Home/Login');
	}
	/** 处理前台用户登录 */
	public function loginDo(){
		$data=$this->input->post();
		$name=$data['user_name'];
		$pwd=md5($data['user_pwd']);
		$res = $this->login->get_sel_one("user_name='$name' && user_pwd='$pwd'");
		// pri($res);die;
		if (!empty($res)) {
			$this->session->set_userdata(array('name'=>$name));
			success('登录成功','Home/Index/index');
		}else{
			success('登录失败');
		}
	}

}