<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Aggreement */

$this->title = 'Update Aggreement: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aggreements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aggreement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
