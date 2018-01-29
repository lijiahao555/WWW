<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class IndexController extends Controller {
    // public function index(){
    //     $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    // }

	public function add(){
		$User=M('day1_type');
		$list=$User->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function addDo(){
		$post=I('post.');
		$User=M('day1');
		$date['name']=$post['name'];
		$date['content']=$post['content'];
		$date['t_id']=$post['type'];
		$sql=$User->add($date);
		if ($sql) {
			// echo "添加成功,跳转中。。。";
			// header('refresh:2;url=./show');
			$this->success('添加成功','./show',2);
		}else{
			// echo "添加失败,跳转中。。。";
			// header('refresh:2;url=./add');
			$this->error('添加失败');
		}
	}
	public function show(){
		$User=M('day1');
		$list=$User->join('day1_type on day1.t_id=day1_type.type_id')->select();
		// var_dump($list);die;
		$this->assign('list',$list);
		$this->display('show');
	}

	public function ajax(){
		$id=I('get.id');
		$User=M('day1');
		$del=$User->where("id='$id'")->delete();
		if ($del==false) {
			echo 0;die;
		}
		$this->show();
	}

}