<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods_type extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Goods_type_model','goods_type');
	}
	/** 展示商品分类展示 */
	public function goods_type_list(){
		$count=$this->goods_type->get_count();
		$page=$this->get_page('Admin/Goods_type/goods_type_list',$count);
		$data=$this->goods_type->get_sel_limit();
		$this->load->vars('data',$data);
		$this->load->vars('page',$page);
		$this->load->view('Admin/goods_type_list');
	}
	/** 展示商品分类添加 */
	public function goods_type_add(){
		$this->load->view('Admin/goods_type_add');
	}
	/** 处理商品分类添加 */
	public function goods_type_addDo(){
		$data = $this->input->post();
		$res = $this->goods_type->get_add($data);
		if ($res) {
			success('添加成功','Admin/Goods_type/goods_type_list');
		}else{
			success('添加成功','Admin/Goods_type/goods_type_add');
		}
	}
	/** 展示商品分类修改 */
	public function goods_type_edit(){
		$id=$this->input->get('id');
		$data=$this->goods_type->get_sel_one("goods_type_id='$id'");
		$this->load->vars('data',$data);
		$this->load->view('Admin/goods_type_edit');
	}
	/** 处理商品分类修改 */
	public function goods_type_editUp(){
		$data=$this->input->post();
		$res=$this->goods_type->get_update($data,'goods_type_id',$data['id']);
		if ($res) {
			success('修改成功','Admin/Goods_type/goods_type_list');
		}else{
			success('修改失败');
		}
	}
	/** 处理商品分类删除 */
	public function del(){
		$id=$this->input->get('id');
		$res=$this->goods_type->get_del('goods_type_id',$id);
		if ($res) {
			echo "ok";
		}else{
			echo "no";
		}
	}
}