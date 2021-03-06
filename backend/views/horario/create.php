<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\horario */

$this->title = 'Create Horario';
$this->params['breadcrumbs'][] = ['label' => 'Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pic' => $pic,
        'tipo' => $tipo,
        'dias' => $dias
    ]) ?>

</div>
