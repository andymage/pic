<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pivote */

$this->title = 'Create Pivote';
$this->params['breadcrumbs'][] = ['label' => 'Pivotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pivote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
