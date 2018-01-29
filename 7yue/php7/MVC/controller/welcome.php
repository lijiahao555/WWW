<?php

class Welcome extends controller{

	//首页
	public function index(){

		$data = M('category_model')->sel();
		$this->assign('data', $data);

		$sql = "SELECT * FROM novel ORDER BY click_num DESC LIMIT 0,6;";
		$nei = M('novel_model')->query($sql);

		$this->assign('nei', $nei);
		$this->display();
	}
	public function one(){
		$u_id = 12;
		// $u_id = $_GET['u_id'];
		// $dian = ++$_GET['dian'];
		$source = M('novel_model')->query("SELECT * FROM novel WHERE n_id=".$u_id);
		$dian = ++$source[0]['click_num'];
		$ss = M('novel_model')->save(array('click_num'=>$dian),array('n_id'=>$u_id));
		echo $ss;exit;
	}

	// 详情页
	public function detail(){

		$id = $_GET['id'];

		$file_name = 'jing_'.$id.'.html';//静态文件名称

		$file_url  = VIEW_DIR.'/jing/'.$file_name;//文件路径

		//查看文件是否存在,不存在自动生成静态文件,,静态文件存在20秒后,自动刷新
		if (!file_exists($file_url) || filemtime($file_url)+20 <= time()) {
echo "静态文件存在20秒后,自动刷新 或 新建此文件";
			ob_start();//开启缓冲区

			$source = M('novel_model')->query("select * from novel where n_id=".$id);

			$source = $source[0];

			$this->assign('source', $source);

			$this->display();

			$nei = ob_get_clean();//获取缓存区内容,并关闭缓存区;

			file_put_contents($file_url,$nei);
		}

		require_once "$file_url";

	}
	// 获取点击量
	public function click_rate(){
		$u_id = $_GET['u_id'];
		$source = M('novel_model')->query("SELECT * FROM novel WHERE n_id=".$u_id);
		$dian = ++$source[0]['click_num'];
		$ss = M('novel_model')->save(array('click_num'=>$dian),array('n_id'=>$u_id));
		if (!$ss) {
			echo false;exit;
		}
		echo $dian;
	}
}

?>

