<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class IndexController extends Controller {
    // public function index(){
    //     $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    // }
	public function show(){	
		$this->display('show');
	}
	public function ajax(){
		$Day7=D('Day7');

		$page=I('get.p',1);
		$sou=I('get.sou','');

		$sql=$Day7->ajax($page,$sou);
		$up=$page-1 <1 ? 1 :$page-1;
		$next=$page+1;
		$this->assign('list',$sql);
		$this->assign('up',$up);
		$this->assign('page',$page);
		$this->assign('next',$next);
		$this->display('ajax');
		
	}
	
	public function del($id){
		$Day7=D('Day7');
		$sql=$Day7->del($id);
		if ($sql) {
			$this->success('删除成功','show',2);
		}else{
			$this->error('失败');
		}
	}
	public function up($id){

		$this->assign('id',$id);
		$this->display('up');
	}
	public function addDo(){
		$post=I('post.');
		// echo $post['id'];die;
		$Day7=D('Day7');
		$sql=$Day7->up($post);
	
		if ($sql) {
			$this->success('修改成功','show',2);
		}else{
			$this->error('失败');
		}
	}
}