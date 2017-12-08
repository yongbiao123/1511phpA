<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "charname".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $yz
 * @property string $long
 * @property string $type
 * @property string $tian
 */
class Charname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'charname';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value', 'yz', 'long', 'type', 'tian'], 'string', 'max' => 255],
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
            'value' => 'Value',
            'yz' => 'Yz',
            'long' => 'Long',
            'type' => 'Type',
            'tian' => 'Tian',
        ];
    }
}
