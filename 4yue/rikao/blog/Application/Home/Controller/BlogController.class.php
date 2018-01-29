<?php 
namespace Home\Controller;
use Think\Controller;
class BlogController extends Controller {
	/** 添加视图 */
	function add(){
		//查询标签数据
		$Label=D('Label')->select();
		$this->assign('list',$Label);
		$this->display('add');
	}
	/** 博文添加 */
	function addDo(){
		$data=I('post.');
		$Blog=D('Blog')->addOne($data);
		if ($Blog) {
			$this->success("添加成功",U('Blog/show'),2);
		}else{
			$this->error("添加失败",U('Blog/add'),2);
		}
	}
	/** 博文展示 */
	function show(){
		$list=D('Blog')->select();
		$this->assign('list',$list);
		$this->display('show');
	}
	/** 博文删除 */
	function del(){
		$id=I('get.id');
		$num=D('Blog')->delOne($id);
		if ($num==1) {
			$this->success("删除成功",U('Blog/show'),2);
		}else{
			$this->error("删除失败",U('Blog/show'),2);

		}
	}
	/** 博文修改页面 */
	function up(){
		$id=I('get.id');
		
		$list=D('Blog')->upfind($id);
		$label=D('Label')->select();
		$arr=M('blog_label')->where("blog_id=".$id)->getField('label_id',true);
		// print_r($label);
		// print_r($arr);die;
		foreach ($label as $k => $v) {
			if (in_array($v['label_id'],$arr)) {
				$label[$k]['flag']=1;
			}else{
				$label[$k]['flag']=0;
			}
		}
		// print_r($type);
		// die;
		$this->assign('list',$list);
		$this->assign('type',$label);
		$this->assign('id',$id);

		$this->display('up');
	}
	/** 修改操作 */
	public function upOne(){
		$data=I('post.');
		// var_dump($data);die;
		$list=D('Blog')->upOne($data);
		if ($list) {
			$this->success("修改成功",U('Blog/show'),2);
		}else{
			$this->error("修改失败",U('Blog/show'),2);
		}
	}

}
 ?>