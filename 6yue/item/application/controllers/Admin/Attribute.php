<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Attribute_model','attribute');
		$this->load->model('Goods_type_model','goods_type');
	}
	/** 展示商品类型列表 */
	public function attribute(){
		$start=$this->input->get('per_page');
		$data=$this->attribute->selectAll($start,3);
		$res=$this->goods_type->selectAll();
		$page=$this->get_page('Admin/Attribute/attribute',3,$this->attribute->count());
		$this->load->vars('data',$data);
		$this->load->vars('res',$res);
		$this->load->vars('page',$page);
		$this->load->view('Admin/attribute_list');
	}
	/** 展示添加商品属性列表 */
	public function add(){
		$data=$this->goods_type->selectAll();
		$this->load->vars('data',$data);
		$this->load->view('Admin/attribute_add');
	}
	/** 处理添加属性数据 */
	public function addDo(){
		$data=$this->input->post();
		$res=$this->attribute->addOne($data);
		if ($res) {
			success('添加成功','Admin/Attribute/attribute');
		}else{
			success('添加失败','Admin/Attribute/attribute');
		}
	}
	/** 展示修改分类属性页面 */
	public function up(){
		$id=$this->input->get('id');
		$data=$this->attribute->select_where('attr_id',$id);
		$result=$this->goods_type->selectAll();
		$this->load->vars('data',$data);
		$this->load->vars('id',$id);
		$this->load->vars('result',$result);
		$this->load->view('Admin/attribute_up');
	}
	/** 处理修改分类属性数据 */
	public function upOne(){
		$data=$this->input->post();
		$res=$this->attribute->upOne(array('attr_id'=>$data['id']),$data);
		if ($res) {
			success('修改成功','Admin/Attribute/attribute');
		}else{
			success('修改失败','Admin/Attribute/attribute');
		}
	}
	/** 处理删除分类属性数据 */
	public function del(){
		$id=$this->input->get('id');
		$res=$this->attribute->delOne(array('attr_id'=>$id));
		if ($res) {
			echo "ok";
		}else{
			echo "no";
		}
	}
	/** 处理下拉菜单的选中 */
	public function change(){
		$id=$this->input->get('id');
		$data=$this->attribute->select_array(array('goods_type_id'=>$id));
		echo json_encode($data);
	}
}