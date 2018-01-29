<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $size=5;
	public function index()
	{
		
		$this->load->model('Mylist');
		$data=$this->Mylist->select('day1',$this->size);
		$count=$this->db->count_all('day1');
		$totalpage=ceil($count/$this->size);
		// dump($totalpage);die;
		// dump($data);die;
		$this->load->view('list',array('data'=>$data,'totalpage'=>$totalpage));
	}

	public function del(){
		$page=$this->input->get('page');
		$id=$this->input->get('id');
		$this->load->model('Mylist');
		$sql=$this->Mylist->del('day1','id',$id);
		//删除之后的总页数
		$count=$this->db->count_all('day1');
		$totalpage=ceil($count/$this->size);
		//判断
		if($page>$totalpage){
			$page=$totalpage;
		}
		$limit=($page-1)*$this->size;
		$data['data']=$this->Mylist->select('day1',$this->size,$limit);
		$data['page']=$page;
		$data['totalpage']=$totalpage;

		// dump($data);die;
		// dump($totalpage);die;
		
		echo json_encode($data);
	}

	public function ajaxpage(){
		$page=$this->input->get('page');
		$limit=($page-1)*$this->size;
		$this->load->model('Mylist');
		$data=$this->Mylist->select('day1',$this->size,$limit);
		echo json_encode($data);
	}
}
