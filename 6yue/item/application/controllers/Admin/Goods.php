<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Goods_model','goods');
		$this->load->model('Goods_type_model','goods_type');
	}
	/** 展示商品信息表 */
	public function goods_list(){
		$this->load->view('Admin/goods_list');
	}
	/** 展示添加商品信息表 */
	public function goods_add(){
		$data=$this->goods_type->selectAll();
		$this->load->vars('data',$data);
		$this->load->view('Admin/goods_add');
	}public function xa(){
		$this->load->view('Admin/xa');
	}

}
