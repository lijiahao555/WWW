<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Goods_model','goods');
		$this->load->model('Admin/Brand_model','brand');
		$this->load->model('Admin/Goods_type_model','goods_type');
		$this->load->model('Admin/Category_model','category');
		$this->load->model('Admin/Photo_model','photo');
		$this->load->model('Admin/Attribute_model','attribute');
		$this->load->model('Admin/Goods_attribute_model','goods_attribute');
		$this->load->model('Admin/Product_model','product');
	}
	/** 展示商品列表 */
	public function goods_list(){
		$limit = $this->uri->segment(4,0);
		//获取总条数
		$goods_count = $this->goods->get_count();
		//获取所有的商品信息
		$goods = $this->goods->get_sel_many(array(),'',$limit);
		//获取所有的分类信息
		$category = $this->category->get_type();
		//获取所有的品牌信息
		$brand = $this->brand->get_sel_many();
		
		//分页
		$page = $this->get_page('Admin/Goods/goods_list',$goods_count);
		
		$arr['goods'] = $goods;
		$arr['category'] = $category;
		$arr['brand'] = $brand;
		$arr['page'] = $page;
		$this->load->vars('arr',$arr);
		$this->load->view('Admin/Goods_list');
	}
	/** 展示商品添加列表 */
	public function goods_add(){
		$arr['category'] = $this->category->get_type();
		$arr['brand'] = $this->brand->get_sel_more();
		$arr['goods_type'] = $this->goods_type->get_sel_many();
		// pri($arr);die;
		$this->load->vars('arr',$arr);
		$this->load->view('Admin/goods_add');
	}
	/** 处理商品添加 */
	public function addDo(){
		$data = $this->input->post();
		$data['add_time']=time();
		$data['auto_thumb'] = isset($data['auto_thumb'])?1:0;
		//转换商品描述下标
		if (!empty($data['editorValue'])) {
			$data['goods_desc']=$data['editorValue'];
		}
		//添加图片
		$img = $this->self_upload('goods','goods_img');
		//处理缩略图 和封面图片
		$data = $this->thumb($data,$img);
		//添加商品入库
		$res = $this->goods->get_add($data);
		//获取商品入库的ID
		$goods_id = $this->goods->get_id($data);
		if ($res) {
			//处理商品相册并入库
			$photo_img = $this->photo($data);
			
			for ($i=0; $i <count($photo_img) ; $i++) { 
				$photo[$i]['goods_id']=$goods_id;
				$photo[$i]['goods_img']=$photo_img[$i];
				$photo[$i]['img_desc']=$data['img_desc'][$i];
			}
			$result = $this->photo->get_add_many($photo);

			if ($result) {
				//处理货品入库
				$is_product = $this->product($data,$goods_id);
				if ($is_product) {
					success('添加成功','Admin/Goods/goods_list');
				}else{
					success('货品添加失败','Admin/Goods/goods_list');
				}
			}else{
				success('商品相册添加失败','Admin/Goods/goods_list');
			}
			
		}else{
			success('商品添加失败','Admin/Goods/goods_list');
		}
	}
	
	
	/** 封装处理缩略图 */
	public function thumb($data,$img){
		//处理用户是否上传图片 封面
		if (is_array($img)) {
			$data['goods_img'] = $img['file_name'];
			$data = $this->thumb($data,$img['file_name']);
		}else{
			$data['goods_img'] = $img;
			$data['goods_thumb'] = $img;
		}
		//判断是否自动缩略
		if ($data['auto_thumb']==1) {
			$small = $this->get_small('goods/'.$img['file_name']);
		}else{
			$new_img = $this->self_upload('goods','goods_thumb');
			$small = $this->get_small('goods/'.$new_img['file_name']);
		}
		//判断缩略成功，拼接成新的名字
		if (is_array($small)) {
			$lengt=strpos($img, '.');
			$front = substr($img,0,$lengt);
			$back = substr($img,$lengt);
			$data['goods_thumb'] = $front.'_thumb'.$back;
		}

		return $data;
	}
	/** 处理商品相册 */
	public function photo($data){
		$img_url = count($_FILES['img_url']['name']);

		for ($i=0; $i < $img_url ; $i++) { 
			$_FILES['photo_img']['name'] = $_FILES['img_url']['name'][$i];
			$_FILES['photo_img']['type'] = $_FILES['img_url']['type'][$i];
			$_FILES['photo_img']['tmp_name'] = $_FILES['img_url']['tmp_name'][$i];
			$_FILES['photo_img']['error'] = $_FILES['img_url']['error'][$i];
			$_FILES['photo_img']['size'] = $_FILES['img_url']['size'][$i];
			$photo = $this->self_upload('goods','photo_img',$i);
			if (is_array($photo)) {
				$photo_img[]=$photo['file_name'];
			}else{
				continue;
			}
		}
		return $photo_img;
	}
	/** 货品入库 */
	public function product($data,$goods_id){
		
		foreach ($data['alter'] as $key => $value) {
			$goods_attribute_id=array();
			foreach ($value as $k => $v) {
				$goods_attribute['goods_id'] = $goods_id;
				$goods_attribute['attr_id'] = $k;
				$goods_attribute['attribute_value'] = $v;
				$res = $this->goods_attribute->sel(array('attribute_value'=>$v,'goods_id'=>$goods_id));
				if (!empty($res)) {
					$goods_attribute_id[]=$res['goods_attribute_id'];
				}else{
					$this->goods_attribute->get_add($goods_attribute);
					$goods_attribute_id[] = $this->goods_attribute->get_id();
				}
			}
			sort($goods_attribute_id);
			$product['product_list'] = implode(',', $goods_attribute_id);
			$product['product_sku'] = $data['sku'][$key];
			$product['product_price'] = $data['price'][$key];
			$product['goods_id'] = $goods_id;
			$result = $this->product->get_add($product);
		}
		return $result;
	}
	
}