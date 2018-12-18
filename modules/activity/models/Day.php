<?php
/**
 * Created by PhpStorm.
 * User: vench
 * Date: 07.12.18
 * Time: 22:16
 */

namespace app\modules\activity\models;

use yii\base\Model;

/**
 * Class Day
 * @package app\modules\activity\models
 */
class Day extends  Model
{

    /**
     * @var \DateTime
     */
    public $date;

    /**
     * @var Activity[]
     */
    public $activities = [];


    /**
     * Day constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * @return bool
     */
    public function isWork() {
        $w = $this->date->format('w');
        return !in_array($w, [0, 6]);
    }

    /**
     * @return bool
     */
    public function isWeekend() {
        return !$this->isWork();
    }


    /**
     * @return static
     */
    static public function makeNow() {
        $model = new static();
        $model->date = new \DateTime();
        return $model;
    }

}