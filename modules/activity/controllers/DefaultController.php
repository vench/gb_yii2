<?php

namespace app\modules\activity\controllers;

use app\modules\activity\models\Activity;
use yii\caching\DbDependency;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use app\modules\activity\models\ActivityDAO;
use yii\web\HttpException;

/**
 * Default controller for the `activity` module
 */
class DefaultController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access'    => [
                'class' => AccessControl::class,
                //'only'  => ['activity'],
                'rules' => [
                    [
                        'actions'   => ['index', 'view'],
                        'allow'    => true,
                        'roles'    => ['@'],
                    ],
                    [
                        'actions'   => ['activity', 'view', 'admin', 'delete', 'update'],
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

        $params = [];
        if(!$isAdmin) {
            $params['id_user']   =  Yii::$app->user->id;
        }

        $list = [];
        if(!Yii::$app->cache->exists($params)) {
            $list = Activity::find()->where($params)->all();
            Yii::$app->cache->set($params, $list, null, new DbDependency([
                'sql'   => 'SELECT MAX(`created_at`) FROM activity',
            ]));
        } else {
            $list = Yii::$app->cache->get($params);
        }

        return $this->render('index', [
            'list' => $list,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->getLoadActivity($id),
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDelete($id) {
        $model = $this->getLoadActivity($id);
        $model->delete();
        return $this->redirect(['admin']);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionUpdate($id) {
        $model = $this->getLoadActivity($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                return $this->refresh();
            }
        }

        return $this->render('activity', [
            'model' => $model,
        ]);
    }


    /**
     * FORM
     * @return string|\yii\web\Response
     */
    public function actionActivity()  {
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


    /**
     * @return string
     */
    public function actionAdmin() {

        $query = Activity::find();
        //$query->onCondition();

        $activitiesProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 4,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id_activity' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('admin', [
            'activitiesProvider'   => $activitiesProvider,
        ]);
    }

    /**
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     * @throws HttpException
     */
    private function getLoadActivity($id) {
        $model = Activity::find()->where([
            'id_activity'    => $id,
        ])->one();

        if(is_null($model)) {
            throw new HttpException(404, "Model Activity not found: {$id}");
        }

        if(!Yii::$app->user->can('admin') && $model->id_user != Yii::$app->user->id) {
            throw new HttpException(403);
        }

        return $model;
    }


}
