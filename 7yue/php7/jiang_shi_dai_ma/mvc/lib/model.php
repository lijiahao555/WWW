<?php

class model{

	public $table_name;	//表名
	public $config;	//配置信息
	public $pdo;	//pdo对象
	public $where = array("1=1");	//条件
	static public $field;	//字段信息 

	public function __construct(){
		//加载数据库配置信息
		$this->config = require CONFIG_DIR.'/config.php';

		$msn = "{$this->config['dbtype']}:host={$this->config['host']};dbname={$this->config['dbname']}";

		$this->pdo = new PDO($msn, $this->config['dbuser'], $this->config['dbpwd']);
	}


	public function add($data = array()){

		//过滤冗余数据
		$param = $this->redun($data);

		//拼接key
		$key = array_keys($param);
		$key = implode(',', $key);

		//拼接值
		$val = "";
		foreach($param as $v){
			$val .= "'$v',";
		}		
		$val = trim($val, ',');

		$sql = "INSERT INTO {$this->table_name}($key) value($val)";

		//执行入库
		$reg = $this->pdo->exec($sql);

		return $reg ? $this->pdo->lastInsertId() : false;

	}

	//where条件
	public function where($data = array()){

		//过滤冗余数据
		$param = $this->redun($data);

		//循环将多组条件写入数组
		foreach($param as $key=>$val){
			$this->where[] = "{$key} = '{$val}'";
		}

		return $this;
	}

	//删除
	public function del($where = array()){

		//如果修改时直接发送修改条件则将条件交给where处理
		if(!empty($where)) $this->where($where);

		$sql = "DELETE FROM {$this->table_name}";

		//处理where条件
		$where = implode(' AND ', $this->where);

		//合并sql和where条件
		$sql .= " WHERE ".$where;

		return $this->pdo->exec($sql);				
	}


	//修改
	public function save($data, $where = array()){

		
		$param = $this->redun($data);

		$sql = "UPDATE {$this->table_name} SET ";

		//拼接修改的sql语句
		foreach($param as $key=>$val){
			$sql .= "{$key}='{$val}',";
		}

		$sql = trim($sql, ',');

		//处理where条件
		$where = implode(' AND ', $this->where);

		//合并sql和where条件
		$sql .= " WHERE ".$where;

		return $this->pdo->exec($sql);
	}

	public function query($sql = ''){
		return $this->pdo->query($sql);
	}

	//过滤冗余字段
	public function redun($data){
		
		$field = $this->field();
		
		foreach($data as $key=>$val){
			if(!in_array($key, $field)){
				unset($data[$key]);
			}
		}

		return $data;
	}

	//获取当前表字段
	public function field(){

		//判断静态属性中已经存在当前表结构直接返回
		if(isset(self::$field[$this->table_name])){
			return self::$field[$this->table_name];
		}

		//获取表字段资源集合
		$source = $this->pdo->query("desc {$this->table_name}");
		$data = $source->fetchAll();

		$field = array_column($data, 'Field');
		
		self::$field[$this->table_name] = $field;

		return $field;
	}
}