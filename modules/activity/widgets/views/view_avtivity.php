<?php

use Yii;

/* @var $model \app\modules\activity\models\Activity */
?>

<div class="alert alert-info">
    <h4>Activity model: </h4>
    <code> <?=$model->getAttributeLabel('activity_name')?>:
        <?= $model->activity_name ?></code> <br>
    <code> <?=$model->getAttributeLabel('id_activity')?>:
        <?= $model->id_activity ?></code>
    <br>
    <code> <?=$model->getAttributeLabel('activity_start_timestamp')?>:
        <?= Yii::$app->formatter->asDate( $model->activity_start_timestamp, Yii::$app->params['format_date_view']) ?>
        <?=$model->getAttributeLabel('activity_end_timestamp')?>:
        <?= Yii::$app->formatter->asDate( $model->activity_end_timestamp, Yii::$app->params['format_date_view']) ?>

    </code>

    <?php if(!is_null($model->user)):?>
    <br/>
    <code>
        Creator: <?=$model->user->username?>
    </code>
    <?php endif; ?>



</div>