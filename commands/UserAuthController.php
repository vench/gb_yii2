<?php
/**
 * Created by PhpStorm.
 * User: vench
 * Date: 13.12.18
 * Time: 21:45
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;
use Yii;
use yii\helpers\Console;

/**
 * Class UserAuthController
 * @package app\commands
 */
class UserAuthController extends Controller
{


    /**
     *
     */
    public function actionInitRbac() {

        $authManager = Yii::$app->authManager;

        $roleAdmin = $authManager->createRole('admin');
        $roleAdmin->description = 'Super user';
        $authManager->add($roleAdmin);

        $roleSimple = $authManager->createRole('simple');
        $roleSimple->description = 'Simple user';
        $authManager->add($roleSimple);

        return ExitCode::OK;
    }

    public function actionAssign($role, $userId) {
        $authManager = Yii::$app->authManager;

        $modelRole = $authManager->getRole($role);
        if(is_null($modelRole)) {
            Console::error("Model role {$role} not found!!");
            return ExitCode::OK;
        }
        $authManager->assign($modelRole, $userId);
        return ExitCode::OK;
    }

    /**
     *
     */
    public function actionUsers() {

        $users = [
            [
                'username' => 'admin',
                'password' => 'admin',
                'auth_key' => 'test100key',
                'accessToken' => '100-token',
                'email'         => 'admin@mail.local',
            ],
            [
                'username' => 'demo',
                'password' => 'demo',
                'auth_key' => 'test101key',
                'accessToken' => '101-token',
                'email'         => 'demo@mail.local',
            ],
        ];

        foreach ($users as $user) {
            $model = new User();
            $model->setAttributes($user, false);
            $model->setPassword($user['password']);
            $model->save();
        }

        return ExitCode::OK;
    }
}