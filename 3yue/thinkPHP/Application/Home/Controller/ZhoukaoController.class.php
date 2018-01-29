<?php 
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class ZhoukaoController extends Controller {
	public function add(){
		$this->display('add');
	}

	public function addDo(){
		$User=M('zhoukao2');
		$post=I('post.');

		$upload=new\Think\Upload();
		$upload->maxSize=3145725;
		$upload->exts=array('jpg','gif','png','jpeg');
		$upload->rootPath='./';
		$upload->savePath='./Public/Uploads/';
		$info=$upload->upload();
		$f=$info['logo'];
		$file=$f['savepath'].$f['savename'];
		
		$date['name']=$post['name'];
		$date['email']=$post['email'];
		$date['logo']=$file;
		$date['count']=$post['count'];
		$date['oder']=$post['oder'];
		$date['show']=$post['show'];
		// for ($i=0; $i <10 ; $i++) { 
		$sql=$User->add($date);
		// }
		

		if ($sql) {
			echo "添加成功，跳转中。。。";
			header('refresh:2;url=./show');
		}else{
			echo "添加失败，跳转中。。。";
			header('refresh:2;url=./add');
		}

	}

	public function show(){
		$User=M('zhoukao2');
		$list=$User->select();

		$this->assign('data',$list);
		$this->display('show');
	}

	public function del($id){

		$User=M('zhoukao2');
		
		$res=$User->where("id=$id")->delete();
		
		if ($res) {
			echo "删除成功";
			header('refresh:2;url=../../show');
		}else{
			echo "删除失败";
			header('refresh:2;url=../../show');
		
		}
		
	}



}
 ?>