<?php

namespace app\modules\activity\widgets;



use app\modules\activity\models\Activity;

/**
 * Class ViewAvtivity
 * @package app\modules\activity\widgets
 */
class ViewAvtivity extends \yii\base\Widget
{


    /**
     * @var Activity
     */
    public $model;


    public function run()
    {
        return $this->render('view_avtivity', [
            'model' => $this->model,
        ]);
    }
}