<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yue extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Yue_model','yue');
	}
	/** 展示数据 */
	public function yue(){
		$data = $this->yue->get_sel('y_goods',"y_is_show=1");

		foreach ($data as $key => $v) {
			$data[$key]['lun'] = $count = $this->yue->get_count('y_lun',"y_goods_id='".$v['y_goods_id']."'");
		}

		$this->load->vars('data',$data);
		$this->load->view('Yue/tejia');
	}
	/** 处理ajax返回的数据 */
	public function ajax(){
		$id = $this->input->get('id');
		$data = $this->yue->get_sel('y_goods',"y_goods_id='$id'");
		
		$count = $this->yue->get_count('y_lun',"y_goods_id='$id'");
		foreach ($data as $key => $v) {
			$data[$key]['lun'] = $count;
		}
		echo json_encode($data);
	}
	/** 登录页面 */
	public function login(){
		$this->load->view('Yue/login');
	}
	/** 处理登录数据 */
	public function loginDo(){
		$data = $this->input->post();
		$name = $data['name'];
		$pwd = $data['password'];
		$res = $this->yue->get_sel('y_user',"y_user_name ='$name' && y_user_pwd='$pwd'" );
		if (is_array($res)) {
			$this->session->set_userdata(array('name'=>$name));
			echo "<script>alert('登录成功');location.href='".site_url('Yue/yue')."'</script>";die;
		}else{
			echo "<script>alert('登录失败');location.href='".site_url('Yue/login')."'</script>";die;
		}
	}
}
