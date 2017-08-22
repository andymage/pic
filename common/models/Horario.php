<?php

namespace common\models;

use Yii;

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
class Horario extends ActiveRecord
{

    const ENCENDIDO = 1;
    const APAGADO = 0;

    const LUNES = 1;
    const MARTES = 2;
    const MIERCOLES = 3;
    const JUEVES = 4;
    const VIERNES = 5;
    const SABADO = 6;
    const DOMINGO = 7;

    public static $tipos = [
        self::APAGADO => 'Apagado',
        self::ENCENDIDO => 'Encendido'
    ];

    public static $dias = [
        self::LUNES => 'Lunes',
        self::MARTES => 'Martes',
        self::MIERCOLES => 'Miercoles',
        self::JUEVES => 'Jueves',
        self::VIERNES => 'Viernes',
        self::SABADO => 'Sabado',
        self::DOMINGO => 'Domingo',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pic', 'dia', 'tipo'], 'required'],
            [['id_pic', 'dia', 'tipo'], 'integer'],
            [['hora', 'fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['id_pic'], 'exist', 'skipOnError' => true, 'targetClass' => Pic::className(), 'targetAttribute' => ['id_pic' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pic' => 'Nombre Pic',
            'dia' => 'Dia',
            'hora' => 'Hora',
            'tipo' => 'Tipo',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPic()
    {
        return $this->hasOne(Pic::className(), ['id' => 'id_pic']);
    }

    public function getNombredias(){
        return self::$dias[$this->dia];
    }

    public function getTipos(){
        if ($this->tipo == 1) {
            return "Encendido";
        }
        else{
            return "Apagado";
        }
    }
}
