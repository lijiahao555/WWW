<?php
class Welcome extends controller{

	//首页
	public function index(){
		require_once "public/curl.class.php";
		$ClassCurl = new ClassCurl;
		$url = "http://www.php7.com/Xiang_Mu/MVC/index.php/data/mass_data";
		$data = $ClassCurl->get($url);
		$data = json_decode($data,true);
		// header("content-type:text/xml;charset=utf-8");

		// var_dump($data);exit;
		$this->assign('data', $data);
		$this->display();

	}

	//登录
	public function login(){
		if (!empty($_POST)) {
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "select * from name where n_name='{$username}' AND n_pas='{$password}'";
			$data = M('name_model')->query($sql);
			var_dump($data);
		}
		$this->assign('nei', 'nei');
		$this->display();

	}

	// 取回密码
	public function get_back(){
		// 取回密码页面,发送验证码ajax触发时间后续处理
		if (!empty($_GET)) {
			$name = $_GET['name'];
			$sql = "select * from name where n_name='{$name}'";
			$data = M('name_model')->query($sql);
			if ($data) {
				$you = $data[0]['n_you'];
				require_once "public/Email.class.php";
				$Mail = new Mail;
				$str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
				$num=$str[mt_rand(0,61)].$str[mt_rand(0,61)].$str[mt_rand(0,61)].$str[mt_rand(0,61)];
				$_SESSION['num'.$name]=$num;
				$data = $Mail->send('<标>验证码</题>',$num,'客服',$you);
				var_dump($data);
			}
			exit;
		}
		//提交页面
		if (!empty($_POST)) {
			$name = $_POST['username'];
			if ($_SESSION['num'.$name]==$_POST['you']) {
				$data = M('name_model')->save(array('n_pas'=>$_POST['password1']),array('n_name'=>$name));
				if ($data) {
					unset($_SESSION['num'.$name]);
					echo "<script>alert('修改成功');location.href='".URL."/Welcome/login';</script>";
				}
			}
			exit;
		}
		$this->assign('nei', 'nei');
		$this->display();
	}

	//用户注册
	public function register(){
			exit;
		$this->assign('nei', 'nei');
		$this->display();

	}

	//搜索
	public function serch(){

		$this->assign('nei', 'nei');
		$this->display();

	}

	//采集
	public function caiji(){
		header("content-type:text/html;charset=gbk");
		include("public/curl.class.php");
		$curl = new ClassCurl;
		$data = $curl->get('http://www.ybdu.com/book8/0/1/');

		$zheng = '#<li class=".*"><a href="(.*)" target=".*">(.*)</a></li>\s*'.
				 '<li class=".*"><a href="(.*)">.*</a></li>\s*'.	
				 '<li class=".*">(.*)</li>\s*'.	
				 '<li class=".*">.*</li>\s*'.	
				 '<li class=".*">(.*)</li>\s*'.
				 '<li class=".*"><span><a href=".*">(.*)</a></span></li>\s*'.
					'#';
		preg_match_all($zheng, $data, $arr);
		unset($arr[0]);
// var_dump($arr);exit;
		foreach ($arr[3] as $k => $v) {
			$data = $curl->get($v);
			$zheng = '#<img src="(.*)" alt=".*" width="140" height="180" onerror=".*"/>\s*'.
				 	'<div class=".*">(.*)</div>\s*'.
				 	'<div class=".*">.*</div>\s*'.
				 	'<div class=".*">.*</div>\s*'.
				 	'<div class=".*">.*</div>\s*'.
				 	'<div class=".*">.*</div>\s*'.
				 	'<div class=".*">.*</div>\s*'.
				 	'<div class=".*">.*</div>\s*'.
				 	'<div class=".*">(.*)</div>\s*'.
				 	'</div>\s*'.
				 	'<div class=".*">\s*'.
				 	'<table width="100%" border="0" cellspacing="0" cellpadding="0" class=".*">\s*'.
				 	'<tbody><tr>\s*'.
				 	'<td colspan=".*">\s*'.
				 	'<div style=".*">\s*'.
				 	'<h1 class=".*">.*</h1>\s*'.
				 	'<p style=".*">.*<a href=".*" style=".*">(.*)</a></p>\s*'.
				 	'<p style=".*">.*<a href=".*">.*</a>.*</p>\s*'.
				 	'</div>\s*'.
				 	'<div class=".*"></div>\s*'.
				 	'</td>\s*'.
				 	'</tr>\s*'.
				 	'<tr>\s*'.
				 	'<td colspan=".*"><span class=".*" style=".*"></span></td>\s*'.
				 	'</tr>\s*'.
				 	'<tr>\s*'.
				 	'<td colspan=".*">\s*'.
				 	'<div style=".*">.*</div><p style=".*">.*</p>\s*'.
				 	'<div class=".*" style=".*">(.*)</div>\s*'.
					'#isU';
			
			preg_match_all($zheng, $data, $ary);

			$img = file_get_contents($ary[1][0]);
			$file_name = date('Ymdhis',time()).mt_rand().'.jpg';
			file_put_contents('public/img/'.$file_name, $img);
			$arra[] = array(
					'cover'       => $file_name,
					'click_num'   => $ary[2][0],
					'is_end'      => $ary[3][0],
					'new_chapter' => $ary[4][0],
					'desc'        => $ary[5][0],
			);
		}
		var_dump($arra);
	}

}

