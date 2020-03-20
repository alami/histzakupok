<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Aggreement */

$this->title = 'Create Aggreement';
$this->params['breadcrumbs'][] = ['label' => 'Aggreements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aggreement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
