<?php  
namespace Home\Controller;
use Think\Controller;
class LogController extends Controller{
	function add(){
		$type=D('Type');
		$list=$type->type();
		$this->assign('type',$list);
		$this->display('add');
	}

	function addDo(){
		$post=I('post.');
		$rizhi=D('Rizhi');
	
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->rootPath   =     './' ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
		$info   =   $upload->upload();    
		// echo "<pre>";
		// var_dump($info);die;
		$rizhi=D('Rizhi');

		$list=$rizhi->rizhi($post);
		// echo $list;die;

		$img=D('Img');
		foreach ($info as $key => $v) {
			// echo $v['savepath'].$v['savename'];;die;
			$arr=array(
				'img_path'=>$v['savepath'].$v['savename'],
				'login_id'=>$list,
				);
			// echo "<pre>";
			// var_dump($arr);die;
			$res=$img->img($arr);
		}
		if ($list&&$res) {
			$this->success('添加成功','./show');
		}else{
			$this->error('添加失败');
		}

	}

	public function show(){
		
		$this->display('show');
	}
	function ajax(){
		$p=I('get.p',1);
		$sou=I('get.sou','');
		$r=I('get.order','');

		$User=M('rizhi');

		$list=$User->where("name like '%$sou%'")->join("type on rizhi.t_id=type.type_id")->join('img on rizhi.i_id=img.img_id')->select();
		foreach ($list as $k => $v) {
			$list[$k]['name']=str_replace($sou, "<font color='red'>$sou</font>", $v['name']);
		}
		// echo "<pre>";
		// var_dump($sql);die;
		$this->assign('list',$list);
		$n=0;
		$this->assign('n',$n);

		$this->display('ajax');
	}
	public function name(){
		$id=I('get.id',1);

		$User=M('rizhi');
		$sql=$User->where("id='$id'")->find();
		$b=$sql['click']+1;
		$a=array(
			'click'=> $b,
			);

		
		$s=$User->where("id='$id'")->save($a); 

		$sql=$User->where("id='$id'")->join("type on rizhi.t_id=type.type_id")->join('img on rizhi.id=img.login_id')->select();
		$this->assign('list',$sql);
		
		$this->display('name');
	}


}


?>