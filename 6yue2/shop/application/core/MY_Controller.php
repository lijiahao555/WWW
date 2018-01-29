<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** 验证用户是否登录 */
class MY_Controller extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Category_model','category');
	}
	/** 校验码 */
	public function get_captcha(){
		$this->load->library('session');
		$this->load->helper('captcha');
      	$vals = array(
			'img_path'  => './captcha/',
			'img_url'   => base_url('captcha'),
			'font_path' => './path/to/fonts/texb.ttf',
			'img_width' => '160',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 3,
			'font_size' => 16,
			'img_id'    => 'Imageid',
			'pool'      => '0123456789',
		);

		$cap = create_captcha($vals);
		$this->session->set_userdata(array('word'=>$cap['word']));
		return $cap;

	}
	public function common(){
		$catagory = $this->category->get_sel_more();
		$category_type = $this->category->get_category($catagory,0);
		return $category_type;
	}
}
/** 后台基类 */
class Admin_Controller extends MY_Controller{
	public function __construct(){
		parent::__construct();
		// 验证管理员是否登录
		if (empty($_SESSION['name'])) {
			success('请先登录','Admin/Login/login');die;
		}

		$name=$this->session->name;
		//求登录人ID
		$this->load->model('Admin/Login_model','login');
		$admin_id=$this->login->id($name);
		foreach ($admin_id as $key => $v) {
			$admin_id=$v;
		}
		//获取访问的url
		$uri1=$this->uri->segment(1);
		$uri2=$this->uri->segment(2);
		$uri3=$this->uri->segment(3);
		$uri=$uri1.'/'.$uri2.'/'.$uri3;
		//判断是否有权限访问  或者是否是超级管理员

		if ($uri2!="Control" && $admin_id!='1') {
			$this->exam($uri,$admin_id);
		}
	}
	/** 检测管理员是否有权限 */
	public function exam($uri,$admin_id){
		//根据id去查询拥有的角色
		$this->load->model('Admin/Admin_role_model','admin_role');
		$role_id=$this->admin_role->role_id($admin_id);
		foreach ($role_id as $key => $v) {
			$new_role_id[]=$v['role_id'];
		}
		//根据用户拥有的角色ID去查询所拥有的权限ID
		$this->load->model('Admin/Role_control_model','role_control');
		$control=$this->role_control->control($new_role_id);
		foreach ($control as $key => $v) {
			$control_id[]=$v['control_id'];
		}
		//根据角色ID权限查出登录管理员所对应的权限
		$this->load->model('Admin/Control_model','control');
		$url=$this->control->url($control_id);
		foreach ($url as $key => $v) {
			$new_url[]=$v['control_url'];
		}
		//判断是否有访问权限
		if (!in_array($uri, $new_url)) {
			success('您没有权限访问');die;
		}
	}
	/** 封装图片上传 */
    public function self_upload	($img_path,$file_name)
    {
    	// echo $file_name;die;
        $config['upload_path']      = './uploads/'.$img_path;
        $config['allowed_types']    = 'gif|jpg|png';
        $config['encrypt_name']    = true;


        $this->load->library('upload',$config);
        //$this->upload->initialize();

        if ( $this->upload->do_upload($file_name))
        {
           	return $this->upload->data();

        }else{
        	return $this->upload->display_errors();
        }
    }


    /**
     * 分页
     * @param  [type] $url   string
     * @param  [type] $count int
     * @return [type]        string
     */
    function get_page($url,$count){

		$size=$this->config->item('page_size');
		$this->load->library('pagination');

	    $config['base_url'] = site_url($url);
	    $config['total_rows'] = $count;
	    $config['per_page'] = $size;
	    $config['first_link'] = '首页';
	    $config['prev_link'] = '上一页';
	    $config['num_links'] = 0;
	    $config['next_link'] = '下一页';
	    $config['last_link'] = '尾页';

	    $this->pagination->initialize($config);

	    $page=$this->pagination->create_links();
	    // pri($page);die;
	    return $page;
	}

	public function get_small($img_url){
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$img_url;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']     = 75;
		$config['height']   = 50;

		$this->load->library('image_lib', $config);
		$aaa=$this->image_lib->resize();

		if ($this->image_lib->resize()) {
			return array('status'=>1);
		}else{
			return $this->image_lib->display_errors();
		}
	}

}

/** 前台基类 */
class Home_Controller extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		if (empty($_SESSION['name'])) {
			success('请先登录','Home/Login/login');die;
		}
	}

}