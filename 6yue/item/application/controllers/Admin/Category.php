<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {
	static $new_data=array();
	public function __construct(){
		parent::__construct();
		$this->load->model('Category_model','category');
	}
	/* 加载商品分类列表 */
	public function category(){
		$data=$this->category->select('category');
		$res=$this->type($data);
		$this->load->vars('res',$res);
		$this->load->view('Admin/category');
	}
	/*处理无限极分类*/
	public function type($data,$parent_id=0,$key=0){
		foreach ($data as $k => $v) {
			if ($v['parent_id']==$parent_id) {
				$data[$k]['key']=$key;
				self::$new_data[]=$data[$k];
				$this->type($data,$v['cat_id'],$key+1);
			}
		}
		return self::$new_data;
	}
	/*添加分类数据*/
	public function category_add(){
		if (!$_POST) {
			$data=$this->category->select();
			$res=$this->type($data);
			$this->load->vars('res',$res);
			$this->load->view('Admin/category_add');
		}else{
			$data=$this->input->post();
			$res=$this->category->add($data);
			if ($res) {
				success('添加成功','Admin/Category/category');
			}else{
				success('添加成功','Admin/Category/category_add');
			}
		}
	}
	/* 删除单条分类*/
	public function category_del(){
		$id=$this->input->get('id');
		$res=$this->category->del($id);
		if ($res) {
			echo "ok";
		}else{
			echo "no";
		}
	}

}
