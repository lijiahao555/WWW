<?php
header("content-type:text/html;charset=utf-8");
include_once('./PHPExcel.php');

/*
    php 将数据库数据写入excel文件
 */
$dsn = "mysql:host=127.0.0.1;dbname=text;"; // 就是构造我们的DSN（数据源）
    $db = new PDO($dsn,'root','root');      // 初始化一个PDO对象
    $sql = "select * from team";        // mysql语句
    $list = $db->query($sql);         // 执行MySQL语句
    $list->setFetchMode(PDO::FETCH_ASSOC);    // 设置获取结果集的返回值的类型-关联数组形式
    $list = $list->fetchAll();          // 提取结果集的内容

// var_dump($list);exit;
    push($list);
/* 导出excel函数*/
     function push($data,$name='Excel'){
          error_reporting(E_ALL);
          date_default_timezone_set('Europe/London');
         $objPHPExcel = new PHPExcel();
        /*以下是一些设置 ，什么作者  标题啊之类的*/
         $objPHPExcel->getProperties()->setCreator("转弯的阳光")
                               ->setLastModifiedBy("转弯的阳光")
                               ->setTitle("数据EXCEL导出")
                               ->setSubject("数据EXCEL导出")
                               ->setDescription("备份数据")
                               ->setKeywords("excel")
                              ->setCategory("result file");
         /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
        foreach($data as $k => $v){
             $num=$k+1;
             //Excel的第A列，uid是你查出数组的键值，下面以此类推
             $objPHPExcel->setActiveSheetIndex(0)
                          ->setCellValue('A'.$num, $v['tid'])    
                          ->setCellValue('B'.$num, $v['t_name'])
                          ->setCellValue('C'.$num, $v['t_code']);
                        }
            $objPHPExcel->getActiveSheet()->setTitle('User');
            $objPHPExcel->setActiveSheetIndex(0);
             header('Content-Type: application/vnd.ms-excel');
             header('Content-Disposition: attachment;filename="'.$name.'.xls"');
             header('Cache-Control: max-age=0');
             $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
             $objWriter->save('php://output');
             exit;
      }














/**
 * 读取excel 将excel表内容 变为php数组形式
* 读取excel $filename 路径文件名 $encode 返回数据的编码 默认为utf8
*以下基本都不要修改
*/
function read($filename,$encode='utf-8'){
  $objReader = PHPExcel_IOFactory::createReader('Excel5');
  $objReader->setReadDataOnly(true);
  $objPHPExcel = $objReader->load($filename);
  $objWorksheet = $objPHPExcel->getActiveSheet();
  $highestRow = $objWorksheet->getHighestRow(); 
  $highestColumn = $objWorksheet->getHighestColumn(); 
  $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 
  $excelData = array(); 
  for ($row = 1; $row <= $highestRow; $row++) { 
      for ($col = 0; $col < $highestColumnIndex; $col++) { 
               $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
      }
  }
  return $excelData;
}
 ?>