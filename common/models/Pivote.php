<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pivote".
 *
 * @property integer $id
 * @property integer $id_pic
 */
class Pivote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pivote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pic'], 'required'],
            [['id_pic'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pic' => 'Id Pic',
        ];
    }
}
