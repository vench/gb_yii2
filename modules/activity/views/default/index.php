<?php
/* @var $list app\modules\activity\models\Activity[] */
/* @var $date \DateTime */



$this->title = 'Index activity';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="activity-default-index">
    <h1>List of Activity</h1>
    <a class="btn btn-primary" href="/activity/default/activity">Create</a>
    <hr/>
    <?php echo \app\modules\activity\widgets\Calendar::widget([
            'activities' => $list,
            'date'       => $date,
    ]); ?>
</div>
