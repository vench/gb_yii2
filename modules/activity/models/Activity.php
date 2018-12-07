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
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var \DateTime
     */
    public $dateTimeStart;

    /**
     * @var \DateTime
     */
    public $dateTimeEnd;

    /**
     * @var boolean
     */
    public $isBlock = false;


    public function rules()
    {
        return [
            [['name','description'], 'required'],
            [['dateTimeStart','dateTimeEnd'], 'date'],
            ['isBlock', 'boolean']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name'  => 'Name Activity',
        ];
    }
}