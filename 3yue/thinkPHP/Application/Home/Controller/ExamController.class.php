<?php 
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class ExamController extends Controller {
	public function add(){
		$this->display();
	}

	public function addDo(){
		$post=I('post.');
		$User = M("day15"); // 实例化User对象
		$data['type'] = $post['type'];
		$data['time'] = $post['time'];
		$sql=$User->add($data);
		if ($sql) {
			echo "添加成功，跳转中。。。";
			header('refresh:2;url=./show');
		}else{
			echo "添加失败，跳转中。。。";
			header('refresh:2;url=./add');

		}
	}

	public function show(){
		// $User = M("day15"); // 实例化User对象// 查找status值为1的用户数据 以创建时间排序 返回10条数据
		// $list = $User->select();
		// $this->assign('sql',$list);
		// $this->display('show');
		$page=I('get.p',1);

		$f=2;
		$User = M('day15'); // 实例化User对象// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 
		$list = $User->page($page,$f)->select();
		$this->assign('list',$list);// 赋值数据集
		$count = $User->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$f);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();// 分页显示输出
		$this->assign('sql',$list);// 赋值分页输出
		$this->assign('page',$show);// 赋值分页输出
		
		$this->display('show'); // 输出模板


	}

	public function del($id){
		// var_dump($id);die;
		$User = M("day15"); // 实例化User对象
		$del=$User->where("id=$id")->delete(); // 删除所有状态为0的用户数据
		
		if ($del) {
			echo "删除成功，跳转中。。。";
			header('refresh:2;url=./show');
		}else{
			echo "删除失败，跳转中。。。";
			header('refresh:2;url=./show');

		}
	}




}


 ?>