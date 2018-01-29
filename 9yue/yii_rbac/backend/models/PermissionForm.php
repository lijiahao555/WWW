<?php
namespace app\models;
use Yii;
use app\models\AuthItem;
use yii\rbac\Item;
/*
 * 权限model
 * 指尖上的艺术家
 */
class PermissionForm extends AuthItem
{
	public function init() {
	    parent::init();
	    $this->type = Item::TYPE_PERMISSION;//常量值 2
	}
}