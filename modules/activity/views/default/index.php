<?php
/* @var $list app\modules\activity\models\Activity[] */



$this->title = 'Index activity';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="activity-default-index">
    <h1>List of Activity</h1>
    <a class="btn btn-primary" href="/activity/default/activity">Create</a>
    <hr/>


    <?php foreach ($list as $model): ?>
        <?php echo \app\modules\activity\widgets\ViewAvtivity::widget([
            'model' => $model,
        ]); ?>
    <?php endforeach; ?>
</div>
