<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Brand_model','brand');
	}
	
	/** 展示品牌列表 */
	public function brand(){
		$start=$this->uri->segment(4);
		$count=$this->brand->get_count();
		$page=$this->get_page('Admin/brand/brand',$count);
		$data=$this->brand->get_sel_limit($start);
		$this->load->vars('data',$data);
		$this->load->vars('page',$page);
		$this->load->view('Admin/brand_list');
	}
	/** 展示品牌添加页面 */
	public function add(){
		$this->load->view('Admin/brand_add');
	}
	/** 处理品牌添加 */
	public function addDo(){
		$data=$this->input->post();
		$file=$this->do_upload('brand','brand_logo');
		$data['brand_logo']=$file['file_name'];
		$res=$this->brand->get_add($data);
		if ($res) {
			success('添加成功','Admin/Brand/brand');
		}else{
			success('添加失败','Admin/Brand/add');
		}
	}
	/** 处理品牌删除 */
	public function del(){
		$id=$this->input->get('id');
		$res=$this->brand->get_del($id);
		if ($res) {
			echo 'ok';
		}else{
			echo "no";
		}
	}
	/** 展示品牌修改页面 */
	public function up(){
		$id=$this->input->get('id');
		$data=$this->brand->get_sel_one("brand_id='$id'");
		$this->load->vars('brand_id',$id);
		$this->load->vars('data',$data);
		$this->load->view('Admin/brand_edit');
	}
	/** 处理品牌修改信息 */
	public function upOne(){
		$data=$this->input->post();
		$file=$this->do_upload('brand','brand_logo');
		if (is_array($file)) {
			$data['brand_logo']=$file['client_name'];
		}
		$res=$this->brand->get_update($data,'brand_id',$data['brand_id']);
		if ($res) {
			success('修改成功','Admin/Brand/brand');
		}else{
			success('修改失败','Admin/Brand/brand');
		}
	}
	/**
	 * 品牌搜索
	 * @return [type] json
	 */
	public function ajax_search(){
		$search=$this->input->get('search');
		$start=$this->uri->segment(4);
		$count=$this->brand->get_count("brand_name like '$search'");
		$page=get_page($this,'Admin/brand/brand',$count,5);
		if ($search=='') {
			$data=$this->brand->get_sel_limit(5,$start);
		}else{
			$data=$this->brand->get_where_limit("brand_name like '$search'",5,$start);
		}
		$res['data']=$data;
		$res['page']=$page;
		echo json_encode($res);
	}
	/** 即点即改is_show */
	public function is_show(){
		$data=$this->input->post();
		$brand_id=$data['brand_id'];
		if ($data['is_show']==0) {
			$data=array('is_show'=>1);
		}else{
			$data=array('is_show'=>0);
		}
		echo $this->brand->get_update($data,'brand_id',$brand_id);
	}
}