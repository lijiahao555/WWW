<?php 
class Db{

	public $ip;//服务器地址,ip
	public $name;//连接数据库，名字;
	public $pwd;//连接数据库，密码;
	public $dbname;//选择的数据库，名字;

	function __construct($ip,$name,$pwd,$dbname){
		$this->ip=$ip;
		$this->name=$name;
		$this->pwd=$pwd;
		$this->dbname=$dbname;
		//实例化时调用连接数据库方法
		$this->connect();

	}

	public function connect(){
		//连接数据库
		mysql_connect($this->ip,$this->name,$this->pwd);
		mysql_select_db($this->dbname);
		mysql_query('set names utf8');
	}
	//sql用法
	// public function add($sql){
	// 	$res=mysql_query($sql);
	// 	if($res){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	public function add($list,$arr){
	
		$c=array_keys($arr);
		$list_keys=implode($c, ',');

		$v=array_values($arr);
		$list_value='"'.implode($v,'","').'"';

		$sql="INSERT INTO $list ($list_keys) VALUES($list_value)";
	
		$res=mysql_query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	//sql用法
	public function delete($sql){
		$res=mysql_query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}
	//高级一点的
	// public function delete($list,$id,$value){
	// 	$sql="delete from $list where $id=$value";
	// 	$res=mysql_query($sql);
	// 	if($res){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	public function update($sql){
		$res=mysql_query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	// public function select($sql){
	// 	$ret = mysql_query($sql);
	// 	$data =array();
	// 	while ($arr = mysql_fetch_assoc($ret)) {
	// 		$data[] = $arr;
	// 	}

	// 	return $data;
	// }

	public function select($biao,$tiaojian){
		$sql="select * from $biao where $tiaojian";
		$res=mysql_query($sql);
		$date=array();
		while ($arr=mysql_fetch_assoc($res)) {
			$date[]=$arr;
		}
		return $date;
	}

}

 ?>