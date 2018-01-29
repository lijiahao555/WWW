<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model','user');
	}
	/** 展示登录页面 */
	public function login()
	{
		$this->load->view('login');
	}
	/** 验证登录信息 */
	public function loginDo(){
		$data=$this->input->post();
		$res=$this->user->exam($data);
		if (is_array($res)) {
			$this->session->set_userdata(array('user_name'=>$data['user_name']));
			success('登陆成功','Demo/demo');
		}else{
			success('登陆失败','Login/login');
		}
	}
}
