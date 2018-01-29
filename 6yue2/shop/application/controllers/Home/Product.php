<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Goods_model','goods');
		$this->load->model('Admin/Photo_model','photo');
		$this->load->model('Home/User_model','user');
		$this->load->model('Admin/Cart_model','cart');
		$this->load->model('Admin/Product_model','product');
	}
	/** 展示详情页 */
	public function product(){
		$goods_id = $this->uri->segment(4,0);

		//获取当前商品的详细信息
		$goods = $this->goods->get_sel_one(array('goods_id'=>$goods_id));

		//获取相册
		$photo = $this->photo->get_sel_more(array('goods_id'=>$goods_id));
		//获取2表联查规格展示
		$goods_attr = $this->product->get_sel_sql($goods_id);
		//获取规格单条数据
		$product = $this->product->get_sel_one(array('goods_id'=>$goods_id));

		foreach ($goods_attr as $k => $v) {
			$goods_attribute[$v['attribute_id']]['attribute_name'] = $v['attribute_name'];
			$goods_attribute[$v['attribute_id']]['attribute_value'][$v['goods_attribute_id']] = $v['attribute_value'];
		}
		sort($goods_attribute);
		$arr['category_type'] = $this->common();
		$arr['goods'] = $goods;
		$arr['photo'] = $photo;
		$arr['goods_attribute'] = $goods_attribute;
		$arr['product'] = $product;
		$arr['goods_id'] = $goods_id;
		// pri($arr['product']);die;
		$this->load->view('Home/Product',array('arr'=>$arr));
	}
	/** 处理购物车 */
	public function cart_add(){
		// $name = $_SESSION['name'];
		// $user_id = $this->user->get_sel_one(array('user_name'=>$name),'user_id');
		// $user_id = implode(',',$user_id);
		$user_id = 1;
		$goods_num = $this->input->get('goods_num');
		$product_id = $this->input->get('product_id');
		$product = $this->product->get_sel_one(array('product_id'=>$product_id));

		$data['buy_number'] = $goods_num;
		$data['product_id'] = $product['product_id'];
		$data['goods_id'] = $product['goods_id'];
		$data['product_list'] = $product['product_list'];
		$data['user_id'] = $user_id;
		$goods_infor = $this->goods->get_sel_one(array('goods_id'=>$product['goods_id']));
		// pri($goods_infor);die;
		$data['goods_name'] = $goods_infor['goods_name'];
		$data['product_price'] = $product['product_price'];
		$data['goods_img'] = $goods_infor['goods_img'];
		$data['market_price'] = $goods_infor['market_price'];
		$res = $this->cart->get_add($data);
		if ($res) {
			echo json_encode('yes');
		}else{
			echo json_encode('no');
		}
		
	}
	/** 处理规格存不存在 */
	public function get_product(){
		$goods_attribute_id = $this->input->get('goods_attribute_id');
		$str =  $this->input->get('str');
		$gsp_id = explode(',',ltrim($str,','));
		sort($gsp_id);
		$goods_attribute_list = implode(',', $gsp_id);
		$data = $this->product->get_sel_many(array('product_list'=>$goods_attribute_list));
		if (empty($data)) {
			$product_info=$this->db->like('product_list',$goods_attribute_id)->get('product')->result_array();
			
			echo json_encode($product_info);die;
		}
		echo json_encode($data);
	}
}