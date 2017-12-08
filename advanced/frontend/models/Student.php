<?php
namespace frontend\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property string $id
 * @property string $username
 * @property integer $sex
 * @property integer $age
 * @property string $hobby
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'age'], 'integer'],
            [['username', 'hobby'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'sex' => 'Sex',
            'age' => 'Age',
            'hobby' => 'Hobby',
        ];
    }
}
