<?php

namespace app\modules\activity\models;


use app\models\User;
use yii\base\Model;
use yii\db\ActiveRecord;


/**
 * Class Activity
 * @package app\modules\activity\models
 */
class Activity extends ActiveRecord
{



    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['activity_name','body'], 'required'],
            [['activity_end_timestamp','activity_start_timestamp'],
                'date', 'format' => 'php:Y-m-d H:i:s'],
            ['id_user', 'integer'],
          //  ['is_block', 'boolean']
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}