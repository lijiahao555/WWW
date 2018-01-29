<?php 
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class LianxiController extends Controller{
	function add(){
		$this->display('add');
	}

	function addDo(){
		$post=I('post.');
		

		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->rootPath   =     './' ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
		$info   =   $upload->upload();    
		if(!$info) {// 上传错误提示错误信息        
			$this->error($upload->getError());
			die;    
		}
		$f=$info['file'];
		$file=$f['savepath'].$f['savename'];


		$User = M("lianxi"); // 实例化User对象
		$data['name'] = $post['name'];
		$data['pwd'] = $post['pwd'];
		$data['type'] = $post['type'];
		$data['file'] = $file;
		$data['count'] = $post['count'];
		// for ($i=0; $i <20 ; $i++) { 
			$res=$User->add($data);
		// }
	
		if ($res) {
			echo "添加成功。。。";
			header('refresh:2;url=./show');
		}else{
			echo "添加失败。。。";
			header('refresh:2;url=./add');
		}
	}

	function show(){
		$this->display('show');
	}

	function ajax(){
		$User = M("lianxi"); // 实例化User对象// 查找status值为1的用户数据 以创建时间排序 返回10条数据
		$page=I('get.p',1);
		$sou=I('get.sou');
		$sou1=I('get.sou1');
		if ($sou==''&&$sou1=='') {
			$where=1;
		}else{
			$where="price>$sou && price<$sou1";
		}
		$size=2;
		
		$list=page('lianxi',$page,$size,$where,"'price' asc");

		foreach ($list['list'] as $k => $v) {
			$list['list'][$k]['name']=str_replace($sou, "<font color='red'>$sou</font>", $v['name']);
			// var_dump($list['list']);die;
		}

		$this->assign('list',$list);
		$this->assign('p',$page);
		$this->display('ajax');

	}

	function del(){
		$id=I('get.id',0);
		$User = M("lianxi"); // 实例化User对象
		$del=$User->delete($id); // 删除id为5的用户数据
		// if ($del) {
		// 	echo 1;		
		// }else{
		// 	echo 2;
		// }
		if ($del==false) {
			echo 0;die;
		}
		$this->ajax();
	}





}




 ?>