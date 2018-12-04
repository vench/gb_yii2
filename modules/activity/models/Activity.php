<?php

namespace app\modules\activity\models;


use app\models\UserEvent;


/**
 * Class Activity
 * @package app\modules\activity\models
 */
class Activity extends UserEvent
{

    public function attributeLabels()
    {
        return [
            'name'  => 'Name Activity',
        ];
    }
}