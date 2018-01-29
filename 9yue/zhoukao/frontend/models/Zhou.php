<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zhou".
 *
 * @property integer $id
 * @property string $name
 * @property string $sort
 * @property string $money
 * @property string $address
 */
class Zhou extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zhou';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sort', 'money', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sort' => 'Sort',
            'money' => 'Money',
            'address' => 'Address',
        ];
    }
}
