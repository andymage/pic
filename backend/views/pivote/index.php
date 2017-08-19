<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PivoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pivotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pivote-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pivote', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_pic',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
