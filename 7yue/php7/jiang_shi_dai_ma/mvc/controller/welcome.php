<?php

class Welcome extends controller{

	public function index(){
		var_dump(M('novel')->sel());exit;
		// $admin_model = M('admin_model');
		// $admin_model->show();

		// $data = array(
		// 		'code'=>'co333de1333',
		// 		'title'=>'我是标题222',
		// 		'aabb'=>'123123'
		// 	);

		// M('admin_model')->where(array("id"=>1));
		// M('admin_model')->del(array('id'=>1));
		// echo $id;exit;

		// $this->assign('data', 'aabb');
		// $this->assign('data1', 'aabb1');
		// $this->display();
	}
	public function one(){
		var_dump(M('novel')->sel());exit;
	}

	public function detail(){

		$id = $_GET['id'];

		$source = M('admin_model')->query("select * from test_error where id=".$id);
		$data = $source->fetch();


	}
}


