<?php

namespace frontend\controllers;
use yii;
use app\models\Zhou;
use yii\data\Pagination;

class ZhouController extends \yii\web\Controller
{

	// public $layout='main';
	public $layout = 'a';
    public function actionIndex()
    {

    	$get = yii::$app->request->get();

    	if (!isset($get['time'])) {

    		$query = Zhou::find();
	    	// var_dump($_GET);die;
		    $data['pagination'] = new Pagination([
	            'defaultPageSize' => 3,
	            // 'PageSize' => 3,
	            'totalCount' => $query->count(),
	        ]);

	        $data['data'] = $query->offset($data['pagination']->offset)->orderBy("time ASC")
	            ->limit($data['pagination']->limit)->asArray()
	            ->all();


    	} else {

	    	if ($get['time'] == '按时间排序') {
	    		$get['time'] = 'time';
	    	}else{
	    		$get['time'] = 'money';
	    	}

	    	$data['address'] = $get['address'];
	    	$data['time'] = $get['time'];

    		$query = Zhou::find();
	    	$data['pagination'] = new Pagination([
	            'defaultPageSize' => 3,
	            // 'PageSize' => 3,
	            'totalCount' => $query->count(),
	        ]);

	    	if ($get['type']=='') {
	    		if ($get['begin']== '') {

		    		if ($get['address'] == '全部'){

		    			$data['data'] = $query->offset($data['pagination']->offset)->orderBy("".$get['time']." ASC")
			            ->limit($data['pagination']->limit)->asArray()
			            ->all();

			    	} else {

			    		$data['data'] = $query->offset($data['pagination']->offset)->where("address = '".$get['address']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();
			    	}

		    	} else {

		    		if ($get['address'] == '全部'){

			    			$data['data'] = $query->offset($data['pagination']->offset)->where("money >= '".$get['begin']."' and money <= '".$get['stop']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();

			    	} else {

			    		$data['data'] = $query->offset($data['pagination']->offset)->where("address = '".$get['address']."' and (money >= '".$get['begin']."' and money <= '".$get['stop']."')")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();
			    	}

			    	$data['begin'] = $get['begin'];
			    	$data['stop'] = $get['stop'];

		    	}
	    	}else{
	    		$query = Zhou::find();
		    	$data['pagination'] = new Pagination([
		            'defaultPageSize' => 3,
		            'totalCount' => $query->count(),
		        ]);
	    		unset($get['begin']);
	    		unset($get['stop']);
	    		$data = $this->type($get,$query,$data);
			    $data['type'] = $get['type'];
			    $data['num'] = isset($get['num']) ? $get['num'] : '';
			    $data['is_int'] = isset($get['is_int']) ? $get['is_int'] : '';
			    $data['config'] = isset($get['config']) ? $get['config'] : '';

	    	}


    	}

	    return $this->render('index',$data);

    }

    /** ajax */
    public function actionAdd(){

    	$get = yii::$app->request->get();

    	if ($get['time'] == '按时间排序') {
    		$get['time'] = 'time';
    	}else{
    		$get['time'] = 'money';
    	}

    	$query = Zhou::find();
    	$data['pagination'] = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);


    	if (!isset($get['begin'] )) {

    		if ($get['address'] == '全部'){

    			$data['data'] = $query->offset($data['pagination']->offset)->orderBy("".$get['time']." ASC")
	            ->limit($data['pagination']->limit)->asArray()
	            ->all();

	    	} else {

	    		$data['data'] = $query->offset($data['pagination']->offset)->where("address = '".$get['address']."'")->orderBy("".$get['time']." ASC")
		            ->limit($data['pagination']->limit)->asArray()
		            ->all();

	    	}

    	} else {

    		if ($get['address'] == '全部'){

	    			$data['data'] = $query->offset($data['pagination']->offset)->where("money >= '".$get['begin']."' and money <= '".$get['stop']."'")->orderBy("".$get['time']." ASC")
		            ->limit($data['pagination']->limit)->asArray()
		            ->all();

	    	} else {

	    		$data['data'] = $query->offset($data['pagination']->offset)->where("address = '".$get['address']."' and (money >= '".$get['begin']."' and money <= '".$get['stop']."')")->orderBy("".$get['time']." ASC")
		            ->limit($data['pagination']->limit)->asArray()
		            ->all();
	    	}

    	}

    	foreach ($data['data'] as $k => $v) {
    		$data['data'][$k]['time'] = date('Y-m-d H:i:s',$v['time']);
    		if ($v['type'] == 1) {
    			$data['data'][$k]['type'] = '酒店式公寓';
    		}else if('type'==0){
    			$data['data'][$k]['type'] = '小区式公寓';
    		}

    		if ($v['is_int'] == 1) {
    			$data['data'][$k]['is_int'] = '整租';
    		}else if('is_int'==0){
    			$data['data'][$k]['is_int'] = '合租';
    		}

    		if ($v['num'] == 1) {
    			$data['data'][$k]['num'] = '一居';
    		}
    		if($v['num']==2){
    			$data['data'][$k]['num'] = '二居';
    		}
    		if($v['num']==3){
    			$data['data'][$k]['num'] = '三居';
    		}
    		if($v['num']==4){
    			$data['data'][$k]['num'] = '四居';
    		}
    		if ($v['config'] == null) {
    			$data['data'][$k]['config'] = ' ';
    		}
    	}

    	echo json_encode($data);
    }

    public function actionAdddo(){
    	$get = yii::$app->request->get();

    	if ($get['time'] == '按时间排序') {
    		$get['time'] = 'time';
    	}else{
    		$get['time'] = 'money';
    	}


    	$query = Zhou::find();
    	$data['pagination'] = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

    	$data = $this->type($get,$query,$data);

    	foreach ($data['data'] as $k => $v) {
    		$data['data'][$k]['time'] = date('Y-m-d H:i:s',$v['time']);
    		if ($v['type'] == 1) {
    			$data['data'][$k]['type'] = '酒店式公寓';
    		}else if('type'==0){
    			$data['data'][$k]['type'] = '小区式公寓';
    		}

    		if ($v['is_int'] == 1) {
    			$data['data'][$k]['is_int'] = '整租';
    		}else if('is_int'==0){
    			$data['data'][$k]['is_int'] = '合租';
    		}

    		if ($v['num'] == 1) {
    			$data['data'][$k]['num'] = '一居';
    		}
    		if($v['num']==2){
    			$data['data'][$k]['num'] = '二居';
    		}
    		if($v['num']==3){
    			$data['data'][$k]['num'] = '三居';
    		}
    		if($v['num']==4){
    			$data['data'][$k]['num'] = '四居';
    		}
    		if ($v['config'] == null) {
    			$data['data'][$k]['config'] = ' ';
    		}
    	}


    	echo json_encode($data);
    }


   	public function type($get,$query,$data){

   		if (empty($get['resert'])) {
   			if (isset($get['type'])) {

		    	if (isset($get['is_int'])) {

		    		if (isset($get['num'])) {

		    			if (isset($get['config'])) {

		    				$data = $this->all($get,$query,$data);

		    			}else{

		    				$data = $this->type_is_int_num($get,$query,$data);

		    			}

		    		}else{

		    			$data = $this->type_is_int($get,$query,$data);

		    		}

		    	}else{

		    		$data = $this->gettype($get,$query,$data);

		    	}



	    	}else{

	    	}
   		}else{

	        $data['data'] = $query->offset($data['pagination']->offset)->orderBy("time ASC")
	            ->limit($data['pagination']->limit)->asArray()
	            ->all();
   		}

    	return $data;

   	}

   	/** 按房源类型 */
   	public function gettype($get,$query,$data){

   		if (!isset($get['begin'] )) {

		    	if ($get['address'] == '全部'){


		    			$data['data'] = $query->offset($data['pagination']->offset)->where("type = '".intval($get['type'])."'")->orderBy("".$get['time']." ASC")
			            ->limit($data['pagination']->limit)->asArray()
			            ->all();

			    	} else {

			    		$data['data'] = $query->offset($data['pagination']->offset)->where("type = '".intval($get['type'])."' and address = '".$get['address']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();

			    	}

		    } else {

		    		if ($get['address'] == '全部'){
			    			$data['data'] = $query->offset($data['pagination']->offset)->where("type = '".intval($get['type'])."' and money >= '".$get['begin']."' and money <= '".$get['stop']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();

			    	} else {
			    		$data['data'] = $query->offset($data['pagination']->offset)->where("type = '".intval($get['type'])."' and address = '".$get['address']."' and (money >= '".$get['begin']."' and money <= '".$get['stop']."')")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();
			    	}

	    	}

	    return $data;
   	}


   	/** 按房源类型和出租方式 */
   	public function type_is_int($get,$query,$data){

   		if (!isset($get['begin'] )) {

		    	if ($get['address'] == '全部'){

		    			$data['data'] = $query->offset($data['pagination']->offset)->where("is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."'")->orderBy("".$get['time']." ASC")
			            ->limit($data['pagination']->limit)->asArray()
			            ->all();

			    	} else {

			    		$data['data'] = $query->offset($data['pagination']->offset)->where("is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."' and address = '".$get['address']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();

			    	}

		    } else {

		    		if ($get['address'] == '全部'){

			    			$data['data'] = $query->offset($data['pagination']->offset)->where("is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."' and money >= '".$get['begin']."' and money <= '".$get['stop']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();

			    	} else {

			    		$data['data'] = $query->offset($data['pagination']->offset)->where("is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."' and address = '".$get['address']."' and (money >= '".$get['begin']."' and money <= '".$get['stop']."')")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();
			    	}

	    	}

	    return $data;
   	}


   	/** 按房源类型和出租方式和居室 */
   	public function type_is_int_num($get,$query,$data){

   		if (!isset($get['begin'] )) {

		    	if ($get['address'] == '全部'){


		    			$data['data'] = $query->offset($data['pagination']->offset)->where("num = '".intval($get['num'])."' and is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."'")->orderBy("".$get['time']." ASC")
			            ->limit($data['pagination']->limit)->asArray()
			            ->all();

			    	} else {

			    		$data['data'] = $query->offset($data['pagination']->offset)->where("num = '".intval($get['num'])."' and is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."' and address = '".$get['address']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();

			    	}

		    } else {

		    		if ($get['address'] == '全部'){
			    			$data['data'] = $query->offset($data['pagination']->offset)->where("num = '".intval($get['num'])."' and is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."' and money >= '".$get['begin']."' and money <= '".$get['stop']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();

			    	} else {
			    		$data['data'] = $query->offset($data['pagination']->offset)->where("num = '".intval($get['num'])."' and is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."' and address = '".$get['address']."' and (money >= '".$get['begin']."' and money <= '".$get['stop']."')")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();
			    	}

	    	}

	    return $data;
   	}

   	/** 全部 */
   	public function all($get,$query,$data){

   		if (!isset($get['begin'] )) {

		    	if ($get['address'] == '全部'){


		    			$data['data'] = $query->offset($data['pagination']->offset)->where("config = '".$get['config']."' and num = '".intval($get['num'])."' and is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."'")->orderBy("".$get['time']." ASC")
			            ->limit($data['pagination']->limit)->asArray()
			            ->all();

			    	} else {

			    		$data['data'] = $query->offset($data['pagination']->offset)->where("config = '".$get['config']."' and num = '".intval($get['num'])."' and is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."' and address = '".$get['address']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();

			    	}

		    } else {

		    		if ($get['address'] == '全部'){
			    			$data['data'] = $query->offset($data['pagination']->offset)->where("config = '".$get['config']."' and num = '".intval($get['num'])."' and is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."' and money >= '".$get['begin']."' and money <= '".$get['stop']."'")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();

			    	} else {
			    		$data['data'] = $query->offset($data['pagination']->offset)->where("config = '".$get['config']."' and num = '".intval($get['num'])."' and is_int = '".intval($get['is_int'])."' and type = '".intval($get['type'])."' and address = '".$get['address']."' and (money >= '".$get['begin']."' and money <= '".$get['stop']."')")->orderBy("".$get['time']." ASC")
				            ->limit($data['pagination']->limit)->asArray()
				            ->all();
			    	}

	    	}

	    return $data;
   	}

}
