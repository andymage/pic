<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\db\BaseActiveRecord;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "horario".
 *
 * @property integer $id
 * @property integer $id_pic
 * @property integer $dia
 * @property string $hora
 * @property integer $tipo
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Pic $idPic
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    public function behaviors(){
        return [
            'creado' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['fecha_alta', 'fecha_actualizacion'],
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => ['fecha_actualizacion'],
                ],
                'value' => function(){
                    return new Expression('now()');
                },
            ],
        ];
    }
}
