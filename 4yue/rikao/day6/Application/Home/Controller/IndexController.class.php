<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    // public function index(){
    //     $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    // }
	public  function add(){
		$this->display();
	}
	public function addDo(){
		$post=I('post.');
		// var_dump($post);die;
		$User=M('day6');
		$time=date('Y-m-d H:i:s');
		$data['username']=$post['username'];
		$data['name']=$post['name'];
		$data['time']=$time;
		$sql=$User->add($data);
		if ($sql) {
			$this->success('成功','show');
		}else{
			$this->error('失败');
		}
	}
	public function show(){
		// $User=M('day6');
		// $list=$User->where("name like '%$sou%'")->limit(0,3)->select();

		// $up=1;
		// $next=2;

		// $count=$User->count();
		// $zong=ceil($count/$size);

		// $page_ye['up']=$up;
		// $page_ye['next']=$next;

		// $this->assign('list',$list);
		// $this->assign('page_ye',$page_ye);
		
		$this->display('show');
	}
	public function ajax(){
		$page=I('get.p',1);
		$sou=I('get.sou','');
		$size=3;

		$User=M('day6');
		$start=($page-1)*$size;

		$count=$User->count();
		$zong=ceil($count/$size);

		$list=$User->where("name like '%$sou%'")->limit($start,$size)->select();

		$up=$page-1 < 1 ? 1 : $page-1;
		$next=$page+1 > $zong ? $zong:$page+1;
		
		$page_num['up']=$up;
		$page_num['next']=$next;

		$arr['list']=$list;
		$arr['page_num']=$page_num;
		// var_dump($arr);die;
		// echo json_encode($arr);die;
		$this->ajaxReturn($arr,'json');

	}
}