<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'captcha'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    // public function actions()
    // {
    //     return [
    //         'error' => [
    //             'class' => 'yii\web\ErrorAction',
    //         ],
    //     ];
    // }
    public function actions()
    {
        return  [
         'captcha' => [
                    'class' => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV === 'test' ? 'testme' : null,
                    'backColor'=>0x000000,//背景颜色
                    'maxLength' => 4, //最大显示个数
                    'minLength' => 4,//最少显示个数
                    'padding' => 5,//间距
                    'height'=>40,//高度
                    'width' => 90,  //宽度
                    'foreColor'=>0xffffff,     //字体颜色
                    'offset'=>4,        //设置字符偏移量 有效果
                    //'controller'=>'login',        //拥有这个动作的controller
            ],
        ];
    }
//     public function actions()
// {
//     return [
//         'captcha' => [
//             'class' => 'yii\captcha\CaptchaAction',
//             'fixedVerifyCode' => YII_ENV === 'test' ? 'testme' : null,
//             'testLimit'=>1,
//             'height' => 34,
//             'width' => 80,
//             'minLength' => 4,
//             'maxLength' => 4
//         ],
//     ];
// }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
