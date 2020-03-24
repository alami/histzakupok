<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserRelatedFilial */

$this->title = 'Create User Related Filial';
$this->params['breadcrumbs'][] = ['label' => 'User Related Filials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-related-filial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
