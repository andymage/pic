<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\horario */

$this->title = 'Update Horario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="horario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pic' => $pic,
        'tipo' => $tipo,
        'dias' => $dias
    ]) ?>

</div>
