<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\time\TimePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\horario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pic')->dropdownlist($pic,[
        'prompt' => 'Selecciona'
    ]) ?>

   

    <?
    if ($model->isNewRecord) {
        echo $form->field($model, 'dia')->widget(Select2::classname(), [
        'data' => $dias,
        'options' => ['placeholder' => 'Selecciona los días ...', 'multiple' => true],
        
        ])->label('Selecciona los Días');
        # code...
    }
    else{
         echo $form->field($model, 'dia')->dropdownlist($dias,[
        'prompt' => 'Selecciona'
    ]);
    }
 ?>

    <?= $form->field($model, 'hora')->widget(TimePicker::className(), [
        'pluginOptions' => [
            'showMeridian' => false,
            'format' => 'HH:ii'
        ]
    ]) ?>

    <?= $form->field($model, 'tipo')->dropdownlist($tipo,['prompt' => 'Selecciona']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
