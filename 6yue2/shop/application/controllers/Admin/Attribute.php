<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Attribute_model','attribute');
		$this->load->model('Admin/Goods_type_model','goods_type');
	}
	/** 展示商品规格列表 */
	public function attribute_list(){
		// $goods_type_id = $this->input->get('id');
		$limit = $this->uri->segment(5,0);
		$goods_type_id = $this->uri->segment(4,0);
		
		$size = $this->config->item('page_size');
		//所对应分类ID的信息
		$data = $this->goods_type->get_sel_more();

		//规格信息
		$res = $this->attribute->get_sel_many("goods_type_id='$goods_type_id'",'',$limit);
		
		//所属分类
		$result = $this->goods_type->get_sel_one("goods_type_id='$goods_type_id'",'type_name');

		
		$count=$this->attribute->get_count("goods_type_id='$goods_type_id'");
		// echo $count;die;
		//分页
		$page = $this->get_page('Admin/Attribute/attribute_list'.'/'.$goods_type_id,$count);
		// pri($page);die;
		$this->load->vars('data',$data);
		$this->load->vars('res',$res);
		$this->load->vars('result',$result);
		$this->load->vars('page',$page);
		$this->load->view('Admin/attribute_list');
	}
	/** 展示商品规格添加列表 */
	public function attribute_add(){
		$data = $this->goods_type->get_sel_more();

		$this->load->vars('data',$data);
		$this->load->view('Admin/attribute_add');
	}
	/** 展示商品规格修改列表 */
	public function attribute_edit(){
		$id = $this->input->get('id');
		$data = $this->attribute->get_sel_one("attribute_id='$id'");
		$res = $this->goods_type->get_sel_more();
		// pri($data);die;
		foreach ($res as $key => $v) {
			if ($v['goods_type_id']==$data['goods_type_id']) {
				$res[$key]['flag']=1;
			}else{
				$res[$key]['flag']=0;
			}
		}
		// pri($res);die;
		$this->load->vars('data',$data);
		$this->load->vars('res',$res);
		$this->load->view('Admin/attribute_edit');
	}

	/** 处理商品规格添加 */
	public function add(){
		$data=$this->input->post();

		$res=$this->attribute->get_add($data);
		if ($res) {
			success('添加成功',"Admin/Attribute/attribute_list".'/'.$data['goods_type_id']);
		}else{
			success('添加失败');
		}
	}

	/** 处理商品规格删除 */
	public function del(){
		$id=$this->input->post('id');
		$res=$this->attribute->get_del($id);
		if ($res) {
			echo json_encode('ok');
		}else{
			echo json_encode('no');
		}
	}
	/** 下拉搜索 */
	public function search(){
		$id=$this->input->post('id');
		$data=$this->attribute->get_sel_many("goods_type_id='$id'");
		$page=$this->get_page('Admin/Attribute/attribute_list'.'/'.$id,$this->attribute->get_count("goods_type_id='$id'"));

		$arr['data'] = $data;
		$arr['page'] = $page;
		
		echo json_encode($arr);
		
	}

	/** 处理修改规格 */
	public function up(){
		$data=$this->input->post();
		
		$res=$this->attribute->get_update($data,$data['id']);
		if ($res) {
			success('修改成功','Admin/Attribute/attribute_list'.'/'.$data['goods_type_id']);
		}else{
			success('修改失败');
		}
	}
	
}