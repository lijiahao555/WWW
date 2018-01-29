<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Login_model','login');
	}
	/** 展示登陆页面 */
	public function login(){
		$captcha = $this->get_captcha();
		$word = $_SESSION['word'];
		// var_dump($_SESSION);
		$this->load->vars('captcha',$captcha['image']);
		$this->load->view('Admin/login');
	}
	/** 处理登录信息 */
	public function loginDo(){
		$data=$this->input->post();
		$word = $this->session->userdata('word');
		$res=$this->login->login($data,$word);
		if ($res==4) {
			$this->session->set_userdata(array('name'=>$data['username']));
			success('登陆成功','Admin/Control/control');
		}else if($res==2){
			success('密码错误');die;
		}else if($res==1){
			success('账号不正确');die;
		}else{
			success('校验码不正确');die;
		}
	}
	/** 刷新验证码 */
	public function refresh(){
		// var_dump($_SESSION);die;
		// header('Access-Control-Allow-Origin:*');
		$captcha=$this->get_captcha();
		echo json_encode($captcha);
	}
	
	
}