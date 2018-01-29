<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_C extends MY_Controller {
	public $site = 10;
	function __construct(){
		parent::__construct();
		$this->load->model('Index_model','work');
		$this->load->model('type_model','type');
	}
	public function index(){
		//$count = $this->work->data_num();
		//var_dump($count);
		$this->load->view('Index/index');
	}
	//添加
	public function add(){
		$this->load->view('Index/add');
	}
	//添加执行
	public function add_do(){
		$data = $this->input->post();
		//接session值
		$user = $this->session->userdata('user');
		$data['user_id'] = $user['user_id'];
		if($this->M->add_data('put_works',$data)){
			redirect('index/index_c/user_show');
		}else{
			success('error',site_url('index/index_c/user_show'));
		}
	}
	//封装展示
	public function get_show($where,$url){
		//接偏移量
		$offset = $this->input->get('per_page');
		//求尾页
		$count = $this->M->data_num('put_works',$where);
		//分页
		$pages = get_pages($this,$this->site,$count,$url);
		//查符合条件的数据
		$res = $this->M->get_data('put_works',$where,$this->site,$offset);
		//返回的数组
		$data = array(
			'data' => $res,
			'pages'=> $pages,
		);
		return $data;
	}
	//展示
	public function show()
	{
		$data = $this->get_show('works_audit=1','Index/index_c/show');
		$this->load->view('Index/show',$data);
	}

	//节目列表
	public function user_show(){
		$user = $this->session->userdata('user');
		$data = $this->get_show('user_id='.$user['user_id'],'Index/index_c/user_show');
		$this->load->view('Index/user_show',$data);
	}
	//审核列表
	public function audit(){
		$data = $this->get_show('works_audit=0','Index/index_c/audit');
		foreach ($data['data'] as $key => $value) {
			if (!empty($value['type_id']))
			{
				$type = $this->type->get_list(array('type_id'=>$value['type_id']))->row_array();
				$data['data'][$key]['type_name'] = $type['type_name'];
			}
			else
			{
				$data['data'][$key]['type_name'] = '未分配';
			}
		}
		$this->load->view('Index/audit',$data);
	}
//审核
	public function state($id){
		$where = array(
				'works_id'=>$id,
			);
		$data = array(
				'works_audit'=>1,
			);
		if($this->M->date_save('put_works',$data,$where)){
			success('审核成功',site_url('Index/index_c/audit'));
		}else{
			success('Update Fail',site_url('Index/index_c/audit'));
		}
	}
	//删除
	public function data_delete()
	{
		$id['works_id'] = $this->uri->segment(4);
		if($this->work->delete($id))
		{
			success();
		}
		else
		{
			error('Delete Fail');
		}
	}
	//修改展示
	public function audit_update()
	{
		$id['works_id'] = $this->uri->segment(4);
		$data = array(
			'work' => $this->work->get_list($id)->row_array(),
			'type' => $this->Tree($this->type->get_list())
			);
		$this->load->view('index/audit_update',$data);
	}
	//修改执行
	public function audit_update_do(){
		if($this->work->update_field($this->input->post()))
		{
			success('修改成功',site_url('Index/index_c/audit'));
		}
		else
		{
			error('修改失败');
		}
	}
	//修改排序
	public function update_stop(){
		$post = $this->input->post();
		$data['works_sort'] = $post['works_sort'];
		if ($this->db->where('works_id',$post['works_id'])->update('put_works',$data))
		{
			echo "1";
		}
		else
		{
			echo "2";
		}
	}


}
