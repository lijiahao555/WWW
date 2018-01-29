<?php

namespace backend\controllers;
use yii;
use yii\rbac\Permission;
use app\models\PermissionForm;
use app\models\RoleForm;

class FormController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionCreate() {
		$auth = Yii::$app->authManager;

       	// 添加 "createPost" 权限
        $createPost = $auth->createPermission('add');
        $createPost->description = 'add';
        $auth->add($createPost);

        // 添加 "updatePost" 权限
        // $updatePost = $auth->createPermission('up');
        // $updatePost->description = 'up';
        // $auth->add($updatePost);

        // 添加 "author" 角色并赋予 "createPost" 权限
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // 添加 "admin" 角色并赋予 "updatePost" 和 "author" 权限
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // $admin = $auth->createRole('admin');
        // $auth->add($admin);
        // $auth->addChild($admin, $updatePost);

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($author, 2);
        $auth->assign($admin, 2);
        echo 3;die;
	}

	public function actionRole()
	{

	}

	public function actionUser(){
		
	}

	public function actionRlll(){
		$model = new RoleForm();
		// $model = new PermissionForm();
		// $permission = new Permission();
	 //   // $permission->name = trim($model->name);
	 //   // $permission->type = $model->type;
	 //   $permission->name = 'demo';
	 //   $permission->type = 'demo/add';
	 //   //权限添加
	 //   Yii::$app->authManager->add($permission);

		// $auth = Yii::$app->authManager;
	 //    $role = $auth->createRole('项目管理');
	 //    $role->description = '创建了 ' . '项目管理' . ' 角色';
	 //    $auth->add($role);

		$childArray = $this->loadRolePermission($model->name);//这个就是返回权限数组
		var_dump($childArray);die;
		if ( !empty( $childArray ) ) {
		  $model->child = $childArray;
		}
		else {
		  $model->child = array();
		}
		//Returns all permissions in the system.
		$permissions = Yii::$app->authManager->getPermissions();
		$perArr = array();
		foreach ($permissions as $key => $value) {
			var_dump($value);die;
		  $perArr[$value->name] = $value->name;
		}
		if ( $model->load( Yii::$app->request->post() ) && $model->validate() ) {
		  //角色对象
		  $child = isset( $_POST['AuthItem']['child'] ) ? $_POST['AuthItem']['child'] : NULL;
		  //表单无法验证child所以当为空的时候跳回原页面
		  //判断角色是否分配权限，已分配则删除，反之增加新的
		  if ( !empty( $childArray ) ) {
		    //Removed all children form their parent.
		    $bool = Yii::$app->authManager->removeChildren( $model );
		    if ( !$bool ) {
		      throw new HttpException(404, '别想糊弄我！凑你一脸～～～');
		    }
		  }
		  //当前角色对象
		  $role = Yii::$app->authManager->getRole( $model->name );
		  //child权限添加
		  if( isset( $child ) ) {
		    foreach ( $child as $val) {
		      //获取权限
		      $childObj = Yii::$app->authManager->getPermission($val);
		      //给item_child表写入数据（权限表）
		      Yii::$app->authManager->addChild( $role, $childObj );
		    }
		  }
		}

		// $role =Yii::$app->authManager->getRole('项目管理');
		// Yii::$app->authManager->assign($role,2);
		// Yii::$app->authManager->checkAccess(2, 'demo');

	}

}
