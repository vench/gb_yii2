<?php

namespace app\modules\activity\models;


use yii\base\Model;


/**
 * Class Activity
 * @package app\modules\activity\models
 */
class Activity extends Model
{

    /**
     * @var integer
     */
    public $id_activity;

    /**
     * @var string
     */
    public $activity_name;

    /**
     * @var string
     */
    public $body;

    /**
     * @var \DateTime
     */
    public $activity_start_timestamp;

    /**
     * @var \DateTime
     */
    public $activity_end_timestamp;

    /**
     * @var boolean
     */
    public $is_block = false;

    /**
     * @var integer
     */
    public $id_user;


    public function rules()
    {
        return [
            [['activity_name','body'], 'required'],
            [['activity_end_timestamp','activity_start_timestamp'],
                'date', 'format' => 'php:Y-m-d H:i:s'],
            ['is_block', 'boolean']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name'          => 'Name Activity',
            'id_activity'   => 'Id Activity',
            'activity_start_timestamp'  => 'Date start',
            'activity_end_timestamp'  => 'Date end',
        ];
    }
}