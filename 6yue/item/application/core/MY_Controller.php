<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	/** 处理用户权限 */
	public function __construct(){
		parent::__construct();
		if (empty($_SESSION['name'])) {
			success('请先登录','Admin/Login/login');die;

		}
		$name=$_SESSION['name'];
		//获取当前用户访问的地址
		$usi_1=$this->uri->segment(1);
		$usi_2=$this->uri->segment(2);
		$usi_3=$this->uri->segment(3);
		$uri=$usi_1.'/'.$usi_2.'/'.$usi_3;
		//查ID
		$this->load->model('User_model','user');
		$user_id=$this->user->id($name);
		if (empty($user_id)) {
				success('请先登录','Admin/Login/login');die;
			}

		if (!$uri=='Admin/Control/control' || !$user_id==4) {
			//根据ID查角色
			$this->load->model('User_role_model','role');
			$role_id=$this->role->select($user_id);
			//根据角色ID查权限
			$this->load->model('Role_control_model','role_control');
			$control_id=$this->role_control->select($role_id);
			//求出权限url
			$this->load->model('Control_model','control');
			$control_control=$this->control->url($control_id);
			if (empty($control_control)) {
				success('您没有权限访问','Admin/Control/control');die;
			}

			if (!in_array($uri,$control_control)) {
				success('您没有权限访问','Admin/Control/control');die;
			}
		}
	}
	/**
	 * 文件上传类
	 * @param  [type] $data      array
	 * @param  [type] $file_name 字段名 string
	 * @return [type]            array
	 */
	public function do_upload($data,$img_path,$file_name)
    {
        $config['upload_path']      = './uploads/'.$img_path;
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 1024*2;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($file_name)=='') {
        	return $data;
        }else{
		    if ( ! $this->upload->do_upload($file_name))
		    {
		        $error = array('error' => $this->upload->display_errors());

		        success($error['error']);
		    }
		    else
		    {
		       $res = array('upload_data' => $this->upload->data());

			   $file = './uploads/'.$img_path.'/'.$res['upload_data']['file_name'];

			   $data[$file_name]=$file;

			   return $data;
		    }
    	}
    }
	/**
	 * [get_pages 分页]
	 * @param  [type] $site  [每页显示量]
	 * @param  [type] $count [总条数]
	 * @param  [type] $url   [跳转地址]
	 * @return [type]        [页码]
	 */
	function get_page($url,$size,$count)
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url($url);


		$config['page_query_string'] = TRUE;


		$config['total_rows'] = $count;


		$config['per_page'] = $size;


		$config['first_link'] = '首页';


		$config['prev_link'] = '上一页';


		$config['next_link'] = '下一页';


		$config['last_link'] = '末页';




		$this->pagination->initialize($config);

		$page = $this->pagination->create_links();


		return $page;


	}
}
