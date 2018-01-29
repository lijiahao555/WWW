<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home/User_model','login');
		$this->load->model('Admin/Category_model','category');
		$this->load->model('Admin/Goods_model','goods');
	}
	/** 展示前台页面 */
	public function index(){
		$data = $this->category->get_sel_more();
		$res = $this->category->get_category($data,0);
		$is_hot = $this->goods->get_sel_many(array('is_hot'=>1,'is_delete'=>0));
		// pri($is_hot);die;
		$this->load->view('Home/Index',array('data'=>$res,'is_hot'=>$is_hot));
	}
	
}