<?php
namespace console\controllers;
use yii;
use yii\console\Controller;

class CrontabController extends Controller {

  public function actionIndex()
  {

      $time = time();

      $sql = "select * from content where (time >= ".($time-60*60*24)." AND time >= ".$time.") AND type = 0";

      $data = Yii::$app->db->createCommand($sql)->queryAll();

      if (isset($data)) {

          foreach ($data as $key => $v) {

              Yii::$app->db->createCommand('update content set type = 1 where id='.$v['id'])->execute();
          }
      }
  }

	/**
	* curl请求封装 get
	*/
	function GetData($url,$data){
      	$ch = curl_init();
      	curl_setopt($ch, CURLOPT_URL, $url);
      	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      	curl_setopt($ch, CURLOPT_HEADER, 0);
      	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
      	curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
      	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
      	$data = curl_exec($ch);
      	curl_close($ch);
      	return $data;
    }
	function getToken($url){
      	$ch = curl_init();
      	curl_setopt($ch, CURLOPT_URL, $url);
      	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      	curl_setopt($ch, CURLOPT_HEADER, 0);
      	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
      	curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
      	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      	$data = curl_exec($ch);
      	curl_close($ch);
      	return json_decode($data, true);
    }
}