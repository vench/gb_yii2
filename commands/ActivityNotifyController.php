<?php
/**
 * Created by PhpStorm.
 * User: vench
 * Date: 21.12.18
 * Time: 21:24
 */

namespace app\commands;

use app\modules\activity\models\Activity;
use yii\console\Controller;
use yii\console\ExitCode;
use Yii;


/**
 * Class ActivityNotifyController
 * @package app\commands
 */
class ActivityNotifyController extends Controller
{

    /**
     * @var string
     */
    public  $user;

    /**
     * @var string
     */
    public $message = 'Test';

    /**
     * @param int $arg1 Some description
     * @return int
     */
    public function actionIndex($arg1 = 0) {

        echo "Hello, {$this->user}; arg1: {$arg1} \n";
        return ExitCode::OK;
    }

    /**
     * @return int
     */
    public function actionSendout(){

        $activities = Activity::find()
            ->with('user')
            ->andWhere(["<=", "CAST(activity_start_timestamp AS DATE)", date('Y-m-d')])
            ->andWhere([">=", "CAST(activity_end_timestamp AS DATE)", date('Y-m-d')])
            ->all();


        echo count($activities), PHP_EOL;

        foreach ($activities as $activitie) {
            $message = Yii::$app->mailer->compose();
            $message->setFrom(Yii::$app->params['default_email']);
            $message->setSubject($activitie->activity_name);
            $message->setTo($activitie->user->email);
            Yii::$app->mailer->send($message);
        }


        return ExitCode::OK;
    }

    /**
     * @param string $actionID
     * @return array|\string[]
     */
    public function options($actionID)
    {
        $data = parent::options($actionID);
        $data[] = 'message';
        $data[] = 'user';
        return  $data;
    }
}