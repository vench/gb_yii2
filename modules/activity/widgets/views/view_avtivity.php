<?php
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
        <?= $model->activity_start_timestamp ?>
        <?=$model->getAttributeLabel('activity_end_timestamp')?>:
        <?= $model->activity_end_timestamp ?>
    </code>

    <br/>

    <?php echo \yii\helpers\Html::a('Delete', [
        'delete', 'id'    => $model->id_activity,
    ], [
        'class' => 'btn btn-danger',
    ]) ?> |
    <?php echo \yii\helpers\Html::a('Edit', [
            'edit', 'id'    => $model->id_activity,
    ], [
            'class' => 'btn btn-info',
    ]) ?>

</div>