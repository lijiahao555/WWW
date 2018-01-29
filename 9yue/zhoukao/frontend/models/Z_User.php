<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "z_user".
 *
 * @property integer $id
 * @property string $tel
 * @property string $pwd
 * @property string $name
 * @property string $shengri
 * @property string $address
 */
class Z_User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'z_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tel', 'pwd', 'name', 'shengri', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => 'Tel',
            'pwd' => 'Pwd',
            'name' => 'Name',
            'shengri' => 'Shengri',
            'address' => 'Address',
        ];
    }
}
