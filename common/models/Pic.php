<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pic".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $ip_encendido
 * @property string $ip_apagado
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Horario[] $horarios
 */
class Pic extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'ip_encendido', 'ip_apagado'], 'required'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['nombre'], 'string', 'max' => 255],
            [['ip_encendido', 'ip_apagado'], 'string', 'max' => 260],
            [['nombre'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'ip_encendido' => 'Ip Encendido',
            'ip_apagado' => 'Ip Apagado',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasMany(Horario::className(), ['id_pic' => 'id']);
    }
}
