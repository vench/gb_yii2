<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;
use yii\helpers\Html;
use yii\helpers\VarDumper;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    /**
     * @return int
     */
    public function actionTest() {
/*
        $data = [
            ['id'   => 1, 'name' => 'Ben'],
            ['id'   => 2, 'name' => 'Mary',],
            ['id'   => 4, 'name' => 'Dima',]
        ];


        ArrayHelper::multisort($data, ['id'], SORT_DESC);

        $result = ArrayHelper::getColumn($data, 'id');

        Console::stdout(  VarDumper::export($result)  ); */

        \Yii::info("All right!!!");

        try {
            Console::stdout( Html::a('Test', ['site/index'], [
                'class' => 'link',
            ]) );
        } catch (\Exception $e) {
            Console::error($e->getMessage());
            \Yii::error("Что то не так!!!");

        }

        $token = 'test';
        \Yii::beginProfile($token);
        $x = $this->f(3);
        echo $x;
        \Yii::endProfile($token);


        $array = \Yii::getLogger()->getProfiling();
        VarDumper::dump($array);

        return ExitCode::OK;
    }

    /**
     * @param $n
     * @return int
     */
    function f($n){
        sleep(1);
        if($n <= 0) {
            return 1;
        }
        return $n * $this->f($n - 1);
    }
}
