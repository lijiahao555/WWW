<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Category_model','category');
	}
	
	/** 展示商品分类列表 */
	public function category_list(){
		$sql="SELECT *,CONCAT(path,'-',category_id) as new_path FROM category ORDER BY new_path asc";
		$data=$this->db->query($sql)->result_array();
		$this->load->view('Admin/category_list',array('data'=>$data));
	}

	/** 展示商品分类添加列表 */
	public function category_add(){
		$sql="SELECT *,CONCAT(path,'-',category_id) as new_path FROM category ORDER BY new_path asc";
		$data=$this->db->query($sql)->result_array();
		$this->load->view('Admin/category_add',array('data'=>$data));
	}

	/** 处理商品分类添加 */
	public function add(){
		$data = $this->input->post();
		$res = $this->category->get_add($data);
		if ($res) {
			success('添加成功','Admin/Category/category_list');
		}else{
			success('添加失败');
		}
	}

	/** 展示商品分类修改列表 */
	public function category_edit(){
		$id=$this->input->get('id');
		$data = $this->category->get_sel_one("category_id='$id'");
		$res = $this->category->get_type();

		foreach ($res as $key => $v) {
			if ($data['category_name']==$v['category_name']) {
				$res[$key]['flag']=1;
			}else{
				$res[$key]['flag']=0;
			}
			
		}
		$this->load->vars('id',$id);
		$this->load->vars('data',$data);
		$this->load->vars('res',$res);
		$this->load->view('Admin/category_edit');
	}

	/** 处理商品分类删除 */
	public function del(){
		$id=$this->input->post('id');
		$res=$this->category->get_sel_many(array('parent_id'=>$id));
		if (empty($res)) {
			echo json_encode($this->category->get_del($id));
		}else{
			echo json_encode(false);
		}
	}
	/** 导航栏是否显示  即点即改 */
	public function change(){
		$id = $this->input->post('id');
		$is_nav = $this->input->post('is_nav');
		if ($is_nav==0) {
			$is_nav=array('is_nav'=>1);
		}else{
			$is_nav=array('is_nav'=>0);
		}
		$res = $this->category->get_update($is_nav,$id);
		if ($res) {
			echo json_encode('ok');
		}else{
			echo json_encode('no');
		}
	}

	public function up(){
		$data = $this->input->post();
		$res = $this->category->get_update($data,$data['category_id']);
		if ($res) {
			success('修改成功','Admin/Category/category_list');
		}else{
			success('修改失败');
		}
	}
}