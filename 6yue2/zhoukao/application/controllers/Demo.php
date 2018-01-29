<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Role_model','role');
		$this->load->model('Infor_model','infor');
	}
	/** 展示总页面 */
	public function demo()
	{
		
		$name = $_SESSION['user_name'];

		$role_name = $this->role->exam($name);

		$this->load->vars('role_name',$role_name['role_name']);

		$this->load->vars('name',$name);

		$this->load->view('demo');
	}
	/** 展示学生申请页面 */
	public function add()
	{	
		$name = $_SESSION['user_name'];

		$this->load->vars('name',$name);

		$this->load->view('add');
	}
	/** 处理学生申请数据 */
	public function addDo(){
		$data = $this->input->post();

		$data['infor_time'] = date("Y-m-d H:i:s");

		$res = $this->infor->add($data);

		if ($res) {
			success('添加成功','Demo/seek');
		}else{
			success('添加失败','Demo/add');
		}
	}
	/** 展示学生查看请假信息 */
	public function seek()
	{
		$name = $_SESSION['user_name'];
		
		$role_name = $this->role->exam($name);

		$this->load->vars('role_name',$role_name['role_name']);

		$this->load->vars('name',$name);

		$data = $this->infor->select_where("user_name='$name'");

		$this->load->vars('data',$data);

		$this->load->view('seek');
	}
	/** 展示学生查看请假信息 */
	public function sum()
	{
		$name = $_SESSION['user_name'];

		$role_name = $this->role->exam($name);

		$this->load->vars('role_name',$role_name['role_name']);

		$this->load->vars('name',$name);

		$data = $this->infor->select();

		$this->load->vars('data',$data);

		$this->load->view('sum');
	}
	/** 展示班主任审批页面 */
	public function ban()
	{
		$name = $_SESSION['user_name'];

		$role_name = $this->role->exam($name);

		$this->load->vars('role_name',$role_name['role_name']);

		$this->load->vars('name',$name);

		$data = $this->infor->select_where("is_ban=0");

		$this->load->vars('data',$data);

		$this->load->view('ban');
	}
	/** 班主任操作审批 */
	public function banDo()
	{
		$infor_id = $this->input->get('infor_id');

		$status = $this->input->get('status');

		if ($status == 1) {
			$data=array('is_ban'=>1);

			$res=$this->infor->up($data,'infor_id',$infor_id);

			if ($res) {
				echo "ok";die;
			}
		}else{

			$data = array('is_ban'=>3);

			$res = $this->infor->up($data,'infor_id',$infor_id);

			if ($res) {
				echo "ok";die;
			}
		}
	}
	/** 展示主任审批页面 */
	public function ren()
	{
		$name = $_SESSION['user_name'];

		$role_name = $this->role->exam($name);

		$this->load->vars('role_name',$role_name['role_name']);

		$this->load->vars('name',$name);

		$data = $this->infor->select_where("is_ban = 1");

		$this->load->vars('data',$data);

		$this->load->view('ren');
	}
	/** 主任操作审批 */
	public function renDo()
	{
		$infor_id = $this->input->get('infor_id');

		$status = $this->input->get('status');

		if ($status == 1) {
			$data=array('is_ban'=>2);

			$res=$this->infor->up($data,'infor_id',$infor_id);

			if ($res) {
				echo "ok";die;
			}
		}else{

			$data = array('is_ban'=>4);

			$res = $this->infor->up($data,'infor_id',$infor_id);

			if ($res) {
				echo "ok";die;
			}
		}
	}
}
