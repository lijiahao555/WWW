<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_member".
 *
 * @property integer $id
 * @property integer $admin_id
 * @property string $admin_name
 * @property string $email
 * @property string $tel
 * @property string $head_img
 */
class Admin_Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id'], 'integer'],
            [['admin_name', 'email', 'tel', 'head_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'admin_name' => 'Admin Name',
            'email' => 'Email',
            'tel' => 'Tel',
            'head_img' => 'Head Img',
        ];
    }
}
