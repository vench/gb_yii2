<?php
/* @var $model app\modules\activity\models\Activity */

?>


<div class="activity-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>



    <?php echo \app\modules\activity\widgets\ViewAvtivity::widget([
            'model' => $model,
    ]); ?>


    <?php yii\bootstrap\Modal::begin([
        'header' => '<h2>Hello world</h2>',
        'toggleButton' => ['label' => 'click me'],
    ]);?>
    <p>Content Modal</p>
    <?php  yii\bootstrap\Modal::end() ?>

    <?php echo \app\modules\activity\widgets\ViewAvtivity::widget([
        'model' => $model,
    ]); ?>
</div>
