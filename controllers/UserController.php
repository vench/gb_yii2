<?php
/**
 * Created by PhpStorm.
 * User: vench
 * Date: 04.12.18
 * Time: 21:32
 */

namespace app\controllers;

use app\models\UserEvent;
use yii\web\Controller;

/**
 * Class UserController
 * @package app\controllers
 */
class UserController extends  Controller
{

    /**
     *
     */
    public function actionEvents() {

        $events = [
            new UserEvent([], [
                'name'  => 'Bla bla',
                'description'   => 'Some text',
            ]),
            new UserEvent([], [
                'name'  => 'Bla bla 1',
                'description'   => 'Some text ...',
            ]),
            new UserEvent([], [
                'name'  => 'Bla bla 2',
                'description'   => 'Some text ...',
            ]),
        ];


        return $this->render('events', [
            'events' => $events,
        ]);
/*

        return $this->renderAjax('events', [
            'events' => $events,
        ]);

        return $this->renderPartial('events', [
            'events' => $events,
        ]);*/
    }
}