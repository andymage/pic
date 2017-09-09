<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pic */

$this->title = 'Crear Computadora';
$this->params['breadcrumbs'][] = ['label' => 'Computadora', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
