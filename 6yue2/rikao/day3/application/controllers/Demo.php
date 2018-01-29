<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {
	public function index()
	{
		$data=$this->db->order_by('demo_id','asc')->get('demo')->result_array();
		$this->load->vars('data',$data);
		$this->load->view('demo');
	}
	public function del(){
		$id=$this->input->get('id');
		$res=$this->db->where('demo_id',$id)->delete('demo');
		if ($res) {
			echo "<script>alert('删除成功');location.href='http://localhost/6yue2/rikao/day3/index.php/Demo/index'</script>";
		}else{
			echo "<script>alert('删除失败');location.href='http://localhost/6yue2/rikao/day3/index.php/Demo/index'</script>";

		}
	}
	public function add(){
		$this->load->view('add');
	}
	public function addDo(){
		$data=$this->input->post();
		$res=$this->db->insert('demo',$data);
		if ($res) {
			echo "<script>alert('添加成功');location.href='".site_url('Demo/index')."'</script>";
		}else{
			echo "<script>alert('添加失败');location.href='".site_url('Demo/add')."'</script>";
		}
	}
	public function up(){
		$id=$this->input->get('id');
		$data=$this->db->where('demo_id',$id)->get('demo')->row_array();
		$this->load->vars('id',$id);
		$this->load->vars('data',$data);
		$this->load->view('up');
	}
	public function upOne(){
		$data=$this->input->post();
		$res=$this->db->where('demo_id',$data['demo_id'])->update('demo',$data);
		if ($res) {
			echo "<script>alert('修改成功');location.href='".site_url('Demo/index')."'</script>";
		}else{
			echo "<script>alert('修改失败');location.href='".site_url('Demo/index')."'</script>";
		}
	}
}
