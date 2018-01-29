<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Home_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Product_model','product');
		$this->load->model('Home/User_model','user');
	}
	/** 处理购物车 */
	public function cart_add(){
		$name = $_SESSION['name'];
		$user_id = $this->user->get_sel_one(array('name'=>$name),'user_id');
		pri($user_id);die;
		$goods_num = $this->input->get('goods_num');
		$product_id = $this->input->get('product_id');
		$product = $this->product->get_sel_one(array('product_id'=>$product_id));

		$data['goods_id'] = $product['goods_id'];
		$data['product_list'] = $product['product_list'];
		$data['user_id'] = $_SESSION['name'];

		
	}
	
}
