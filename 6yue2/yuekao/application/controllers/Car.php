<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Yue_model','yue');
		if (empty($_SESSION['name'])) {
			echo "<script>alert('请先登录');location.href='".site_url('Yue/login')."'</script>";die;
		}
	}
	/** 展示购物车 */
	public function car(){
		$name = $_SESSION['name'];
		$user = $this->yue->get_one('y_user',"y_user_name='$name'");
		$user_id = $user['y_user_id'];

		$data = $this->yue->get_sel('y_shop',array('y_user_id'=>$user_id));
		$price = array_column($data,'y_shop_price');
		$this->load->vars('data',$data);
		$this->load->vars('price',$price);
		$this->load->view('Yue/car');
	}
	/** 添加购物车 */
	public function add(){
		$data = $this->input->post();
		$name = $_SESSION['name'];
		$user = $this->yue->get_one('y_user',"y_user_name='$name'");
		$data['y_user_id'] = $user['y_user_id'];

		$res = $this->yue->get_add('y_shop',$data);
		if ($res) {
			echo "<script>alert('添加成功');location.href='".site_url('Yue/yue')."'</script>";die;
		}else{
			echo "<script>alert('添加失败');location.href='".site_url('Yue/yue')."'</script>";die;
		}
	}
}
