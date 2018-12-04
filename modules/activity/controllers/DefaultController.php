<?php

namespace app\modules\activity\controllers;

use app\modules\activity\models\Activity;
use yii\web\Controller;

/**
 * Default controller for the `activity` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $model = new Activity();
        $model->name = 'test';

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
