<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function admin(){
    	$this->display('admin');
    }
    public function adminDo(){
    	$name=I('post.name');
    	$pwd=I('post.pwd');
    	$User=M('yuekao_admin');
    	$sql=$User->where("name='$name'")->find();
    	if ($sql) {
    		if ($pwd==$sql['pwd']) {
    			echo "登陆成功";
    			header('refresh:2;url=./show');
    		}else{
    			echo "密码错误";
    			header('refresh:2;url=./admin');
    		}
    	}else{
    		echo "用户名错误";
    		header('refresh:2;url=./admin');
    	}

    }
    public function show(){
    	$this->display('show');
    }
    public function ajax(){
    	$p=I('get.p',1);

    	$shang=I('get.shang','');

    	$sou=I('get.sou');

    	$size=3;
    	if ($sou==''&&$shang==1) {
    		$where="hh='$shang'";
    	}else if($sou==''&&$shang==0){
			$where="hh='$shang'";
    	}else if($sou!=''&&$shang==2){
			$where="name like '%$sou%'";
    	}else if($sou!=''&&$shang!=2){
			$where="name like '%$sou%' and hh = '$shang'";
    	}else{
            $where='';
        }

    
    	
    	
    	// echo $where;die;
    	$list=page('yuekao',$p,$size,$where);

    	$this->assign('list',$list);
    	$this->display('ajax');
    	
    }


}