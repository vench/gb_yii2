<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\activity\models\Activity */
/* @var $form ActiveForm */

$this->title = 'Form activity';
$this->params['breadcrumbs'][] = [
        'url' => '/activity/default/index',
        'label'=> 'Index activity'
];
$this->params['breadcrumbs'][] = $this->title;

?>



<div class="default-activity">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'activity_name') ?>
        <?= $form->field($model, 'body')->textarea(); ?>

        <?= $form->field($model, 'activity_start_timestamp')->widget(
                'kartik\date\DatePicker',
                    [
                        'name'  => 'activity_start_timestamp',
                    ]
        ) ?>
        <?= $form->field($model, 'activity_end_timestamp')->widget(
            'kartik\date\DatePicker',
            [
                'name'  => 'activity_end_timestamp',
            ]
        )  ?>


    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), [
                    'class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- default-activity -->
