<?php

class Welcome extends controller{

	//首页
	public function index(){
		
		$p = empty($_GET['p']) ? 1 : $_GET['p'];//当前页数
		$file_name = 'public/huan/'.$p.'.html';
		if (!file_exists($file_name) || filemtime($file_name)+300<=time()) {
			echo "最新生成静态文件";
			$pian = ($p-1)*20;// 偏移量
			$count = M('lian_xi_model')->query('select count(1) from lian_xi');
			$count = $count[0]['count(1)'];//获取总条数
			$zong = ceil($count/20);// 获取总页数
			$memcache = new memcache;  //实例化 memcache 类
		    $memcache->connect('127.0.0.1'); // 连接
		    if (!$data = $memcache->get($p)) {
		    	echo "最新生成";
				$data = M('lian_xi_model')->query('select *from lian_xi limit '.$pian.',20');
				// $memcache->add($p,$data,0,time()+60*20);
				$memcache->set($p,$data,false,60*20); // 添加
		    }
			$this->assign('data', $data);// 数据
			$this->assign('zong', $zong);// 总页数
			ob_start(); // 打开缓冲区		
			$this->display();
			$data = ob_get_clean();//返回内部缓冲区的内容，关闭缓冲区。相当于执行 
			file_put_contents($file_name, $data);
		}
		require_once $file_name;
		
	}
	public function ll(){
		$memcache = new memcache;  //实例化 memcache 类
	    $memcache->connect('127.0.0.1'); // 连接
		var_dump($memcache);
	}

	public function huo(){
		$dsn = "mysql:host=127.0.0.1;dbname=text;";	//就是构造我们的DSN（数据源）
		$db = new PDO($dsn,'root','root');			// 初始化一个PDO对象
		$time = time();
		$sql = "INSERT INTO lian_xi(l_name,l_email,l_time) VALUES('mingzi','ming@126.com','".$time."')";				// mysql语句
		$str = '';
		for ($i=1; $i < 1000; $i++) { 
			$str .= ",('mingzi','ming@126.com','".$time."')";
		}
		$sql .= $str;
		$list = $db->exec($sql);
	}
}

?>
