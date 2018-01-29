<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_C extends CI_Controller {
	function __construct(){
		parent::__construct();
		//引入Model
		$this->load->model('login_model','M');
		$this->load->library('session');
	}
	//登陆
	public function index()
	{
			$this->load->view('Login/login');
	}
	//验证登陆
	public function user_login(){
		$obj = $this->input->post();
		$obj['user_pwd'] = md5($obj['user_pwd']);
		if($data = $this->M->get_one('user',$obj)){
			unset($data['user_pwd']);
			//var_dump($data);die();
			$this->session->set_userdata('user', $data);
			redirect('Index/index_c/index');
		}else{
			success('账号或密码有误',site_url('login/Login_C/index'));
		}
	}
	//退出
	public function user_exit(){
		$this->session->unset_userdata('user');
		redirect('login/login_c/index');
	}


}
