<?php 
class Db{

	public $ip;//服务器地址,ip
	public $name;//连接数据库，名字;
	public $pwd;//连接数据库，密码;
	public $dbname;//选择的数据库，名字;

	function __construct(){
		$this->ip='127.0.0.1';
		$this->name='root';
		$this->pwd='0509';
		$this->dbname='day3rikao';
		//实例化时调用连接数据库方法
		$this->connect();

	}

	public function connect(){
		//连接数据库
		mysql_connect($this->ip,$this->name,$this->pwd);
		mysql_select_db($this->dbname);
		mysql_query('set names utf8');
	}

	public function add($list,$arr){
		
		$list_value='"'.implode($arr,'","').'"';

		$sql="INSERT INTO $list VALUES(null,$list_value)";
		// echo $sql;die;
		$res=mysql_query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function delete($list,$value){
		$sql="delete from $list where $value";

		$res=mysql_query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function update($sql){
		$res=mysql_query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function select($count,$list,$tiaojian){

		$sql="select $count from $list where $tiaojian";
	
		$res=mysql_query($sql);

		$date=array();
		while ($arr=mysql_fetch_assoc($res)) {
			$date[]=$arr;
		}
		return $date;
	}

	public function select1($count,$list,$number){

		$sql="SELECT COUNT($count) AS num FROM $list";
		
		$res=mysql_query($sql);
		
		$date=array();
		while ($arr=mysql_fetch_assoc($res)) {
			$zong=ceil($arr['num']/$number);
			$date[]=$zong;
		}
		return $date;
	}

	public function query($sql){
		return mysql_query($sql);
	}
	
	// public function add($sql){
	// 	$res=mysql_query($sql);
	// 	if($res){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }


	// public function delete($sql){
	// 	$res=mysql_query($sql);
	// 	if($res){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }


	// public function update($sql){
	// 	$res=mysql_query($sql);
	// 	if($res){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	// public function select($sql){
	// 	$res=mysql_query($sql);
	// 	$date=array();
	// 	while ($arr=mysql_fetch_assoc($res)) {
	// 		$date[]=$arr;
	// 	}
	// 	return $date;
	// }


}

 ?>