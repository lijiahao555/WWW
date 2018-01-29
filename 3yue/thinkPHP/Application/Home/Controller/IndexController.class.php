<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends Controller {
    public function index(){
		//$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
	}

	public function add(){
		$this->display();
	}

	public function addDo(){
		$time=time();
		$post=(I('post.'));
		$User = M('day14');
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->rootPath  =	'./';
		$upload->savePath  =     './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
		$info   =   $upload->upload();  

		if(!$info) {// 上传错误提示错误信息        
			$this->error($upload->getError()); 
			die;   
		}
		
		$file=$info['file'];
		$path=$file['savepath'].$file['savename'];
		// var_dump($path);die;
		$data['name'] = $post['name'];
		$data['type'] = $post['type'];
		$data['count'] = $post['count'];
		$data['date'] = $time;
		$data['file'] = $path;
		
		$res=$User->add($data);
		
		if ($res) {
			echo "添加成功。。";
			header('refresh:2;url=./show');
		}else{
			echo "添加失败。。。";
			header('refresh:2;url=./show');
		}
	}

	public function show(){
		$User = M('day14'); // 实例化User对象// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 
		$page=I('get.p',1);
		$size=5;
		$list=page('day14',$page,$size);
		// $list = $User->page($page,$size)->select();
		// $this->assign('sql',$list);// 赋值数据集
		// $count = $User->count();// 查询满足要求的总记录数
		// $Page = new \Think\Page($count,$size);// 实例化分页类 传入总记录数和每页显示的记录数
		// $show = $Page->show();// 分页显示输出
		$this->assign('sql',$list);// 赋值分页输出
		$this->display('show'); // 输出模板
	}

	public function delete($id){
		$Form = M('day14');
		$sql=$Form->delete($id);
		if ($sql) {
			echo "删除成功。。";
			header('refresh:2;url=./show');
		}else{
			echo "删除失败。。。";
			header('refresh:2;url=./show');
		}
		
	}

	public function save_1($id){
		$this->assign('id',$id);
		$this->display('save');
	}

	public function save(){

		$User = M("day14"); // 实例化User对象
		$time=time();
		$post=I('post.');
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->rootPath  =	'./';
		$upload->savePath  =     './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
		$info   =   $upload->upload();  

		if(!$info) {// 上传错误提示错误信息        
			$this->error($upload->getError()); 
			die;   
		}
		
		$file=$info['file'];
		$path=$file['savepath'].$file['savename'];
		// 要修改的数据对象属性赋值
		$id=$post['hidd'];
		$da['name'] = $post['name'];
		$da['type'] = $post['type'];
		$da['count'] = $post['count'];
		$da['time'] = $time;
		$da['file'] = $path;
		
		$up=$User->where("id=$id")->save($da); // 根据条件更新记录


		if ($up) {
			echo "修改成功。。";
			header('refresh:2;url=./show');
		}else{
			echo "修改失败。。。";
			header('refresh:2;url=./show');
		}

	}

	public function ajax(){
		$User = M('day14'); // 实例化User对象// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 
		$page=I('get.p',1);
		$p=I('get.sou');
		$size=5;
		$list=page('day14',$page,$size,"name like '%$p%'");
		
		$this->assign('sql',$list);// 赋值分页输出
		$this->assign('p',$page);// 赋值分页输出
		$this->display('ajax');

	}
	
	public function dele(){
		$id=I('get.id',0);
		$sou=I('get.sou');
		$User = M("day14"); // 实例化User对象
		$res=$User->where("id=$id && name like '%$sou%'")->delete(); // 删除id为5的用户数据
		if ($res==false) {
			echo 0;die;
		}
		$this->ajax();
	}

}