<?php 
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class LogController extends Controller {

	function add(){
		$this->display();
	}

	function addDo(){
		$post=I('post.');
		$time=date('Y-m-d H:i:s');
		
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize = 3145728 ;// 设置附件上传大小    
		$upload->rootPath = './' ;// 设置附件上传大小    
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->savePath = './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
		$info = $upload->upload();    
		if(!$info) {// 上传错误提示错误信息        
			$this->error($upload->getError());    
		}
		
		$file=$info['file'];

		$f=$file['savepath'].$file['savename'];
		
		$User = M("day16"); // 实例化User对象
		$data['name'] = $post['name'];
		$data['count'] = $post['count'];
		$data['file'] = $f;
		$data['date'] = $time;
		// for ($i=0; $i <50 ; $i++) { 
			$res=$User->add($data);
		// }
		

		if ($res) {
			echo "添加成功。。。";
			header('refresh:1;url=./show');
		}else{
			echo "添加失败。。。";
			header('refresh:1;url=./add');
		}
	}

	public function show(){
		$this->display('show');

	}

	public function ajax(){

		$User = M('day16'); // 实例化User对象// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 

		$get=I('get.p',1);
		$size=5;

		$list=page('day16',$get,$size);
		$this->assign('data',$list);// 赋值分页输出
		$this->assign('pa',$get);// 赋值分页输出
		$this->display('ajax');

	}

	public function del(){
		$g=I('get.id',0);
		
		$User = M("day16"); // 实例化User对象
		$res=$User->where("id=$g")->delete(); // 删除id为5的用户数据

		if ($res==false) {
			echo 0;die;
		}

		$this->ajax();
	}

}
 ?>