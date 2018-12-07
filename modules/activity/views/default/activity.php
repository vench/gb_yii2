<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\activity\models\Activity */
/* @var $form ActiveForm */



?>
<div class="default-activity">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'description')->textarea(); ?>

        <?= $form->field($model, 'dateTimeStart') ?>
        <?= $form->field($model, 'dateTimeEnd'); ?>

        <?= $form->field($model, 'isBlock')->checkbox(); ?>

    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), [
                    'class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- default-activity -->
