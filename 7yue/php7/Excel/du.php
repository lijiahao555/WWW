<?php
//方法二
header("content-type:text/html;charset=utf-8");
require('PHPExcel.php');//引入PHP EXCEL类
$PHPReader    = new PHPExcel_Reader_Excel2007();
$PHPReader    = new PHPExcel_Reader_Excel5();
$PHPExcel     = $PHPReader->load('aa.xls');        //建立excel对象
$currentSheet = $PHPExcel->getSheet(0);        //**读取excel文件中的指定工作表*/
$arr = $currentSheet->toArray();

unset($arr[0]);

$dsn = "mysql:host=127.0.0.1;dbname=text;";	//就是构造我们的DSN（数据源）
$db = new PDO($dsn,'root','root');			// 初始化一个PDO对象

//人员入库获取人员id
foreach ($arr as $key => $value) {
	$sql = "INSERT INTO staff(staff_name) VALUES('".$value[0]."')";				// mysql语句
	$list = $db->exec($sql);					// 执行MySQL语句的另一种方法
	$name_id[$value[0]] = $db->lastInsertId();  // 人员的id
}

// 部门去重 入库 获取部门id
foreach ($arr as $key => $value) {
	$bumen[] = $value[1];
	$fuze[]  = $value[6];
}
$bumen = array_unique($bumen);
$fuze = array_unique($fuze);
foreach ($bumen as $key => $value) {
	$sql = "INSERT INTO org(o_name,staff_id) VALUES('".$value."','".$name_id[$fuze[$key]]."')";// mysql语句
	$list = $db->exec($sql);	// 执行MySQL语句的另一种方法
	$bumen_id[$value] = $db->lastInsertId();  // 部门的id
}

//入库团队信息 并获取id  
foreach ($arr as $key => $value) {
	$tuandiu1[] = $value[2]; 
	$tuandiu2[] = $value[4]; 
}
$tuandiu1 = array_unique($tuandiu1);
$tuandiu2 = array_unique($tuandiu2);
foreach ($tuandiu1 as $k => $v) {
	$sql = "INSERT INTO team(t_name,t_code) VALUES('".$v."','".$tuandiu2[$k]."')";// mysql语句
	$list = $db->exec($sql);	// 执行MySQL语句的另一种方法
	$tuandiu_id[$v] = $db->lastInsertId();  // 团队的id
}

// 入库小团队信息 并获取id
foreach ($arr as $key => $value) {
	$xiaotuandiu1[$value[2]][] = $value[3]; 
	$xiaotuandiu2[$value[2]][] = $value[5];
}
foreach ($xiaotuandiu1 as $key => $value) {
	$xiaotuandiu1[$key] = array_unique($value);
	$xiaotuandiu2[$key] = array_unique($xiaotuandiu2[$key]);
}
foreach ($xiaotuandiu1 as $k => $v) {
	foreach ($v as $ke => $val) {
		$sql = "INSERT INTO xiao_team(x_name,x_code,tid) VALUES('".$xiaotuandiu2[$k][$ke]."','".$val."','".$tuandiu_id[$k]."')";// mysql语句
		$list = $db->exec($sql);	// 执行MySQL语句的另一种方法
		$xiaotuandiu_id[$val] = $db->lastInsertId();  // 小团队的id
	}
}


// 入库人员信息
foreach ($arr as $k => $v) {
	if (empty($name_id[$v[7]])) {
		$name_id[$v[7]] = 0;
	}
	$sql = "UPDATE staff SET oid='".$bumen_id[$v[1]]."',tid='".$tuandiu_id[$v[2]]."',t_cid='".$xiaotuandiu_id[$v[3]]."',senior='".$name_id[$v[7]]."' WHERE staff_name='".$v[0]."';";// mysql语句
		$list = $db->exec($sql);	// 执行MySQL语句的另一种方法
}
exit;






















exit;
//方法一
require('PHPExcel.php');//引入PHP EXCEL类

var_dump(format_excel2array('aa.xls'));

function format_excel2array($filePath='',$sheet=0){
    if(empty($filePath) or !file_exists($filePath)){die('file not exists');}
    $PHPReader = new PHPExcel_Reader_Excel2007();        //建立reader对象
    if(!$PHPReader->canRead($filePath)){
        $PHPReader = new PHPExcel_Reader_Excel5();
        if(!$PHPReader->canRead($filePath)){
            echo 'no Excel';
            return ;
        }
    }
	$PHPExcel     = $PHPReader->load($filePath);        //建立excel对象
	$currentSheet = $PHPExcel->getSheet($sheet);        //**读取excel文件中的指定工作表*/
	$allColumn    = $currentSheet->getHighestColumn();        //**取得最大的列号*/
	$allRow       = $currentSheet->getHighestRow();        //**取得一共有多少行*/
	$data         = array();
    for($rowIndex=1;$rowIndex<=$allRow;$rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始
        for($colIndex='A';$colIndex<=$allColumn;$colIndex++){
            $addr = $colIndex.$rowIndex;
            $cell = $currentSheet->getCell($addr)->getValue();
            if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
                $cell = $cell->__toString();
            }
            $data[$rowIndex][$colIndex] = $cell;
        }
    }
    return $data;
}

?>