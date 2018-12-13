<?php

namespace app\modules\activity\controllers;

use app\modules\activity\models\Activity;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use app\modules\activity\models\ActivityDAO;

/**
 * Default controller for the `activity` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access'    => [
                'class' => AccessControl::class,
                //'only'  => ['activity'],
                'rules' => [
                    [
                        'actions'   => ['index'],
                        'allow'    => true,
                        'roles'    => ['@'],
                    ],
                    [
                        'actions'   => ['activity'],
                        'allow'     => true,
                        'roles'     => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $isAdmin = Yii::$app->user->can('admin');
        $find = Activity::find();

        if(!$isAdmin) {
            $find = $find->where([
                'id_user'   =>  Yii::$app->user->id,
            ]);
        }

        return $this->render('index', [
            'list' => $find->all(),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionActivity()
    {
        $model = new \app\modules\activity\models\Activity();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = Yii::$app->user->id;
            if ($model->validate()) {
                $model->save();
                return $this->redirect(['index']);
            }
        }

        return $this->render('activity', [
            'model' => $model,
        ]);
    }


}
