<?php

/* @var $activitiesProvider yii\data\ActiveDataProvider */


use yii\grid\GridView;
use Yii;

$this->title = 'Admin grid Activity';
$this->params['breadcrumbs'][] = [
    'url' => '/activity/default/index',
    'label'=> 'Index activity'
];
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?=$this->title?></h1>
<?php
echo GridView::widget([
    'dataProvider' => $activitiesProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute'  => 'id_activity',
        ],
        [
            'label' => 'Название',
            'attribute' => 'activity_name',
            'value' => function($data){return $data->activity_name;}
        ],
        [
            'label' => 'Дата начала',
            'attribute' => 'activity_start_timestamp ',
            'value' => function($model) {
                return Yii::$app->formatter->asDate( $model->activity_start_timestamp
                    , Yii::$app->params['format_date_view']); },
        ],
        [
            'label' => 'Дата завершения',
            'attribute' => 'activity_end_timestamp ',
            'value' => function($model) {
                return Yii::$app->formatter->asDate( $model->activity_end_timestamp
                    , Yii::$app->params['format_date_view']);
      },
        ],
        [
                'class'     => 'yii\grid\ActionColumn',
                //'template'  => '{view}',
        ],
    ],
]);