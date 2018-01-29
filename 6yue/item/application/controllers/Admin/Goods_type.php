<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods_type extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Goods_type_model','goods_type');
	}
    /*加载商品类型列表*/
    public function goods_type(){
    	$res=$this->goods_type->selectAll();
    	$this->load->vars('res',$res);
        $this->load->view('Admin/goods_type');
    }
    /*商品类型添加*/
    public function add(){
        $this->load->view('Admin/goods_type_add');
    }
    /*处理商品类型添加*/
    public function addDo(){
        $data=$this->input->post();
        $res =$this->goods_type->addOne($data);
        if ($res) {
        	success('添加成功','Admin/Goods_type/goods_type');
        }else{
        	success('添加失败','Admin/Goods_type/goods_type_add');
        }
    }
    /**
     * 展示修改商品类型
     * @return [type] id int
     */
    public function goods_type_up(){
        $id=$this->input->get('id');
        $this->load->vars('id',$id);
        $this->load->view('Admin/goods_type_up');
    }
    /**
     * 处理修改内容
     * @return [type] boor
     */
    public function compile(){
        $data=$this->input->post();
        $res=$this->goods_type->upOne(array('goods_type_id'=>$data['id']),$data);
         if ($res) {
            success('修改成功','Admin/Goods_type/goods_type');
        }else{
            success('Admin/Goods_type/goods_type');
        }
    }
}