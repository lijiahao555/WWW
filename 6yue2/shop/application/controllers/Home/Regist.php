<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home/User_model','login');
	}
	/** 展示前台用户注册 */
	public function regist(){
		$captcha = $this->get_captcha();
		$this->load->vars('captcha',$captcha['image']);
		$this->load->view('Home/Regist');
	}
	/** 处理前台用户注册 */
	public function registDo(){
		$data=$this->input->post();
	}
	public function refresh(){
		$new_captcha = $this->get_captcha();
		echo json_encode($new_captcha);
	}
}