<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'fio_ru',
            'fio_uz',
            'filial_id',
            //'department',
            //'position',
            //'phone',
            //'mobile',
            //'email:email',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'verification_token',
            ['attribute' => 'role','value' => function ($model) {return  Helper::getRoles()[$model->role]; }],
            ['attribute' => 'status','value' => function ($model) {return  Helper::getUserStatuses()[$model->status]; }],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
