<?php

/* @var $model app\modules\activity\models\Activity */


use yii\widgets\DetailView;


$this->title = 'View Activity: '.$model->activity_name.'';
$this->params['breadcrumbs'][] = [
    'url' => '/activity/default/index',
    'label'=> 'Index activity'
];
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?=$this->title?></h1>
<?php

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'activity_name',
        'body:html',
        [
            'label'          => 'Автор',
            'value'          => !is_null($model->user) ? $model->user->username : '---',
            'contentOptions' => ['class' => 'bg-red'],
            'captionOptions' => ['tooltip' => 'Tooltip'],
        ],
        'activity_start_timestamp:datetime',
        'activity_end_timestamp:datetime'
    ],
]);
