<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property string $id
 * @property string $tel
 * @property string $password
 * @property string $repassword
 * @property string $name
 * @property string $sr
 * @property string $address
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'register';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tel', 'password', 'repassword', 'name', 'sr', 'address'], 'string', 'max' => 255],
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
            'password' => 'Password',
            'repassword' => 'Repassword',
            'name' => 'Name',
            'sr' => 'Sr',
            'address' => 'Address',
        ];
    }
}
