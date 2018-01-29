<?php
class data extends controller{

	// 接口
	public function  mass_data(){
		
		// 楼层1 推举(最新的)数据
		$sql = "select * from novel order by add_time desc limit 0,6";
		$data['lou1'] = M('novel_model')->query($sql);

		// 楼层2 六个种类的
		for ($i=1; $i <= 6; $i++) { 
			$sql = "select * from novel where cat_id={$i} order by add_time desc  limit 0,6";
			$data['lou2'][$i] = M('novel_model')->query($sql);
		}

		// 楼层3 最新的15本小说
		$sql = "select * from novel order by add_time desc limit 0,15";
		$data['lou3'] = M('novel_model')->query($sql);

		$data['fenlei'] = M('category_model')->sel(); // 所有分类

		echo $this->select($_GET,$data);

	}

	// 判断以什么格式传回去
	public function select($get,$data){

		if (!empty($_GET['jsonp'])) {
			return $_GET['jsonp']."(".json_encode($data).")";
		}
		
		if (!empty($_GET['format']) && $_GET['format']='xml') {
		 	require_once "public/XML.class.php";
			$xml = new xml;
			return $xml->set_xml($data);
		}
		return json_encode($data);
	}

}
