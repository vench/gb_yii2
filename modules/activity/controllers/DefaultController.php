<?php

namespace app\modules\activity\controllers;

use app\modules\activity\models\Activity;
use yii\web\Controller;
use Yii;
use app\modules\activity\models\ActivityDAO;

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
        $search = new Activity();
        $activityDAO = new ActivityDAO();

        return $this->render('index', [
            'list' => $activityDAO->search($search),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionActivity()
    {
        $model = new \app\modules\activity\models\Activity();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here

                $activityDAO = new ActivityDAO();
                $activityDAO->create($model);

                return $this->redirect(['index']);
            }
        }

        return $this->render('activity', [
            'model' => $model,
        ]);
    }

    /**
     *

    public function actionSuccess() {
        echo 'success';
        exit();
    } */

}
