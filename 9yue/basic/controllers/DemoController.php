<?php

namespace app\controllers;

use Yii;

//使用控制器
use yii\web\Controller;

//使用分页
use yii\data\Pagination;
use yii\data\Sort;

//使用Country模型
use app\models\Country;

use app\models\AddForm;

use app\models\AdminForm;
use app\models\UpForm;
use app\models\Form;

use DfaFilter\SensitiveHelper;


class DemoController extends Controller
{
    public function actionIndex()
    {
    	//使用记录 方式 查询  以数组的形式返回 all多 one 单
        // $query = Country::find()->asArray()->one();

        //使用pdo  queryAll多 queryOne单
        // $query = Yii::$app->db->createCommand('select * from country')->queryAll();
        // print_r($query);die;

        // $pagination = new Pagination([
        //     'defaultPageSize' => 5,
        //     'totalCount' => $query->count(),
        // ]);

        // $countries = $query->orderBy('name')
        //     ->offset($pagination->offset)
        //     ->limit($pagination->limit)
        //     ->all();
        // return $this->render('index', [
        //     'countries' => $countries,
        //     'pagination' => $pagination,
        // ]);
    }

    public function actionAdd(){
    	$model = new AddForm;
		$cookies = Yii::$app->request->cookies;//注意此处是request
		$language = $cookies->get('name', 'defaultName');//设置默认值
		$page = Yii::$app->request->get('page') ? Yii::$app->request->get('page') : 1 ;
    	if (!empty($language->value)) {
    		if (!empty(Yii::$app->request->post()['AddForm'])) {
	    		$data = Yii::$app->request->post('AddForm');

	    		$wordData = array(
				    '连腾宇',
				    '抢劫',
				    '黄片',
				    '麻痹',
				    '成人卡通',
				);
	    		$filterContent = SensitiveHelper::init()->setTree($wordData)->replace($data['name'], '***');
	    		$filterContents = SensitiveHelper::init()->setTree($wordData)->replace($data['password'], '***');

	    		$res = Yii::$app->db->createCommand('insert into form(name,password,add_name) value("'.$filterContent.'","'.$filterContents.'","'.$language->value.'")')->execute();

	    		if ($res) {
					// $result = Yii::$app->db->createCommand('select * from form')->queryAll();
					header('location:http://localhost/9yue/basic/web/index.php?r=demo/add');
	    		}
	    	}else{

	    		$query = Form::find();

		        $pagination = new Pagination([
		            'defaultPageSize' => 3 ,
		            'totalCount' => $query->count(),
		        ]);

		        $countries = $query->orderBy(['id' => SORT_DESC])
				            ->offset($pagination->offset)
				            ->limit($pagination->limit)
				            ->all();
				// print_r($countries);die;
	    		// $result = Yii::$app->db->createCommand('select * from form')->queryAll();

	    		return $this->render('add',['model'=>$model,'page'=>$page,'countries' => $countries,'pagination' => $pagination,'name'=>$language->value]);
	    	}
    	}else{
			return $this->redirect(['demo/admin']);
    	}

	}

	public function actionAdmin(){
		$model = new AdminForm;
		if (!empty(Yii::$app->request->post()['AdminForm'])) {

			$data = Yii::$app->request->post('AdminForm');

			$res = Yii::$app->db->createCommand('select * from user where name = "'.$data['name'].'" and password = "'.$data['password'].'"')->queryOne();

			if (is_array($res)) {
				$cookies = Yii::$app->response->cookies;

				$cookies->add(new \yii\web\Cookie([
				    'name' => 'name',
				    'value' => $data['name'],
				]));
    			return $this->redirect(['demo/add']);
			}
		}else{

			return $this->render('login',['model'=>$model]);

		}

	}


	public function actionDel(){
		$id = Yii::$app->request->get('id');

		$res = Yii::$app->db->createCommand('delete from form where id = "'.$id.'"')->execute();
		
		if ($res) {
			return $this->redirect(['demo/add']);
		}
	}

	public function actionUp(){
		$model = new UpForm;

		$id = Yii::$app->request->get('id');

		if (!empty(Yii::$app->request->post()['UpForm'])) {
			$data = Yii::$app->request->post('UpForm');

			$res = Yii::$app->db->createCommand('update form set name = "'.$data['name'].'",password = "'.$data['password'].'" where id = "'.$data['id'].'"')->execute();

			if ($res) {
				return $this->redirect(['demo/add']);
			}
		}else{
			$data = Yii::$app->db->createCommand('select * from form where id = "'.$id.'"')->queryOne();

			return $this->render('up',['model'=>$model,'data'=>$data]);
		}

	}


}
