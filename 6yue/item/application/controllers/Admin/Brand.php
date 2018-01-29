<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Brand_model','brand');
	}
	/** 展示商品列表 */
	public function brand(){
		$start=$this->input->get('per_page');
		$data=$this->brand->selectAll($start,3);
		$count=$this->brand->count();
		$page=$this->get_page('Admin/Brand/brand/',3,$count);

		$this->load->vars('data',$data);
		$this->load->vars('page',$page);
		$this->load->view('Admin/brand');
	}
	/** 展示添加商品信息 */
	public function brand_add(){
		$this->load->view('Admin/brand_add');
	}
	/** 处理添加信息 */
	public function brand_addDo(){

		$data=$this->input->post();
		$res=$this->do_upload('brand','brand_logo');
        $res=$this->brand->add($data);
        if ($res) {
        	success('添加成功','Admin/Brand/brand');
        }else{
        	success('添加失败','Admin/Brand/brand_add');
        }
	}

	/** 删除数据 */
	public function del(){
		$id=$this->input->get('id');
		$res=$this->brand->del($id);
		if ($res) {
			echo "ok";
		}else{
			echo "no";
		}
	}
	/** 编辑数据展示页面 */
	public function up(){
		$id=$this->input->get('id');
		$res=$this->brand->up_select($id);
		$this->load->vars('id',$id);
		$this->load->vars('res',$res);
		$this->load->view('Admin/brand_up');
	}
	/** 处理修改数据 */
	public function up_one(){
		$data=$this->input->post();
		$data=$this->do_upload($data,'brand','brand_logo');
        $res=$this->brand->upOne(array("brand_id"=>$data['brand_id']),$data);
        if ($res) {
        	success('修改成功','Admin/Brand/brand');
        }else{
        	success('修改失败','Admin/Brand/brand');
        }
	}
}