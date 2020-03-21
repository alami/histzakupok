<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;
use backend\models\Helper;
use backend\models\Filial;

/* @var $this yii\web\View */
/* @var $model backend\models\Bid */
/* @var $form yii\widgets\ActiveForm */
?>
<?php //VarDumper::dump(Filial::find()->select('id', 'name_ru')->asArray()->all(),10,true);
$filials = Filial::find()->select(['id','name_ru'])->asArray()->all();
$filarr = []; foreach ($filials as $k=>$v) $filarr[$v['id']]=$v['name_ru'];
?>

<div class="bid-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"><?= $form->field($model, 'filial_id')
                    ->dropDownList($filarr); ?></div>
            <div class="col-sm-4"><?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-4"><?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><?= $form->field($model, 'max_cost')->textInput() ?></div>
            <div class="col-sm-4"><?= $form->field($model, 'currency_id')->dropDownList([Helper::getCurrencies()]); ?></div>
            <div class="col-sm-4"><?= $form->field($model, 'bid_status')->textInput() ?></div>
        </div>
        <div class="row">
            <div class="col-sm-3"><?= $form->field($model, 'created_at')->textInput(['disabled' => true])->label('Created At') ?></div>
            <div class="col-sm-3"><?= $form->field($model, 'updated_at')->textInput(['disabled' => true])->label('Updated At') ?></div>
            <div class="col-sm-3"><?= $form->field($model, 'created_by')->textInput(['disabled' => true])->label('Created By') ?></div>
            <div class="col-sm-3"><?= $form->field($model, 'updated_by')->textInput(['disabled' => true])->label('Updated By') ?></div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
