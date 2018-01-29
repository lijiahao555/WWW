<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends MY_Controller {
	static $arr=array();
	public function __construct(){
		parent::__construct();
		$this->load->model('Infor_model','infor');

		$this->load->model('Role_model','role');
		$this->load->model('User_model','user');
		$this->load->model('Type_model','type');
	}
	/** 展示审核页面 */
	public function exam(){
		$data=$this->type->select();
		$result=$this->type($data);
		pr($result);die;
		$name=$_SESSION['name'];
		$role_name=$this->role->name($name);
		$res=$this->infor->exam_select();
		$count=$this->infor->exam_num();
		$this->load->vars('zong',$count);
		$this->load->vars('name',$role_name);
		$this->load->view('Exam/exam',array('data'=>$res));
	}
	/** 无限极分类 */
	public function type($data,$parent_id=0,$key=0){
		foreach ($data as $k => $v) {
			if ($v['parent_id']==$parent_id) {
				$data[$k]['key']=$key;
				self::$arr[]=$data[$k];
				$this->type($data,$v['type_id'],$key+1);	
			}
		}
		return self::$arr;
	}
	/** 待审核返回的ajax */
	public function Exam_ajax(){
		$ye=$this->input->get('ye');
		$data=$this->infor->Exam_ajax($ye,10);
		// $count=$this->infor->num();
		echo json_encode($data);
	}

	/** 处理审核信息 */
	public function exam_exam(){
		$infor_id=$this->input->get('id');
		$page=$this->input->get('page');
		$name=$_SESSION['name'];
		$user_id=$this->user->id($name);
		$res=$this->infor->exam_add($infor_id,$user_id);
		if ($res) {
			$ye=$this->input->get('ye');
			$data=$this->infor->exam_ajax($page,10);
			echo json_encode($data);
		}else{
			echo "no";
		}
	}
	/** 处理删除节目 */
	public function del(){
		$infor_id=$this->input->get('id');
		$res=$this->infor->del($infor_id);
		if ($res) {
			success('删除成功','Exam/exam');
		}else{
			success('删除失败','Exam/exam');
		}
	}
	/** 处理修改节目 */
	public function up(){
		$infor_id=$this->input->get('id');
		$res=$this->infor->selectOne($infor_id);
		$this->load->vars('id',$infor_id);
		$this->load->vars('res',$res);
		$this->load->view('Exam/up');
	}
	public function upOne(){
		$data=$this->input->post();
		$res=$this->infor->up($data);
		if ($res) {
			success('修改成功','Exam/exam');
		}else{
			success('修改失败','Exam/exam');
		}
	}
}
