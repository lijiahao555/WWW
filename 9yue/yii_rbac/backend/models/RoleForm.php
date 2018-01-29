<?php
namespace app\models;
use Yii;
use app\models\AuthItem;
use yii\rbac\Item;
/*
 * 角色model
 * 指尖上的艺术家
 */
class RoleForm extends AuthItem
{
  	public function init() {
    	parent::init();
   	 	$this->type = Item::TYPE_ROLE;//yii-rbac-Role隐藏继承常量这里的值是1
  	}
}