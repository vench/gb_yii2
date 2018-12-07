<?php

namespace app\modules\activity\controllers;

use app\modules\activity\models\Activity;
use yii\web\Controller;
use Yii;

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

    public function actionActivity()
    {
        $model = new \app\modules\activity\models\Activity();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here

                return $this->redirect(['index']);
            }
        }

        return $this->render('activity', [
            'model' => $model,
        ]);
    }

    /**
     *
     */
    public function actionSuccess() {
        echo 'success';
        exit();
    }

}
