<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorylist extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home/User_model','login');
		$this->load->model('Admin/Category_model','category');
		$this->load->model('Admin/Goods_model','goods');
		$this->load->model('Admin/Goods_type_model','goods_type');
		$this->load->model('Admin/Brand_model','brand');
		$this->load->model('Admin/Brand_model','brand');
	}
	/** 展示前台页面 */
	public function categorylist(){
		$category_id = $this->uri->segment(4,0);
		//查询的商品信息
		$goods = $this->goods->get_where_in('category_id',$category_id);
		
		// 无限极分类
		$category_many = $this->category->get_sel_more();
		$category_type = $this->category->get_category($category_many);
		//品牌信息
		$brand = $this->brand->get_sel_more(array('is_show'=>1));

		//商品类型信息
		$goods_type = $this->goods_type->get_sel_more();
		$data['category_type'] = $category_type;
		$data['goods'] = $goods;
		$data['brand'] = $brand;
		$data['goods_type'] = $goods_type;
		
		$this->load->view('Home/Categorylist',array('data'=>$data));
	}
	
}