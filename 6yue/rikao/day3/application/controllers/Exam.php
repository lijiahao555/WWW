<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
    function __construct(){
        parent::__construct();
        $_SESSION['control_id']=2;
        $this->load->model('user_model','user');
         $arr= $this->user->id(2);
        foreach ($arr as $key => $v) {
            $role_id[]=$v['role_id'];
        }
        $this->load->model('Role_control_model');
        
    }

    public function add(){
        if(!$_POST){
        	$this->load->model('user_model');
        	$result=$this->user_model->selectAll();
        	$this->load->vars('data',$result);
            $this->load->view('exam');
        }else{
        	$data=$this->input->post();
        	$this->load->model('user_model');

			$res=$this->user_model->add($data);
			
			if ($res) {
				$result=$this->user_model->selectAll();
				echo json_encode($result);
			}
        }
    }

    public function del(){
        $id=$this->input->get('id');
        $this->load->model('user_model');
        $result=$this->user_model->del($id);
        if ($result) {
            echo 'ok';
        }else{
            echo 'no';
        }
    }

    public function video(){
        echo "视频管理";
    }

    public function music(){
        echo "音乐管理";
    }

    public function dress(){
        echo "服饰管理";
    }

    public function fruit(){
        echo "水果管理";
    }

     public function foot(){
        echo "食品管理";
    }



}
