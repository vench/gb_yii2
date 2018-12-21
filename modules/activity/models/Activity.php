<?php

namespace app\modules\activity\models;


use app\models\User;
use yii\base\Model;
use yii\db\ActiveRecord;
use Yii;


/**
 * Class Activity
 * @package app\modules\activity\models
 */
class Activity extends ActiveRecord
{

    const EVENT_MY_CASE = '1234';

    //use SetDefaultDateTrait;

    public function runMyCase() {
        // TODO

        $s = 0;
        for($i = 0; $i < 10; $i ++) {
            $s += $i*$i;
        }

        var_dump($s);



        $this->trigger(self::EVENT_MY_CASE);
    }

    /**
     * @return array
     */
    public function behaviors() {
        return [
           /* [
                'class'         => SetDefaultDateBehavior::class,
                'fieldValidate' => 'activity_end_timestamp',
                'fieldDefault'  => 'activity_start_timestamp',
            ],  */
           'cache'=> [
               'class'  => ActiveRecordCacheBehavior::class,

           ]
        ];
    }

    public static function findById($id)
    {
        $model = new static();
        return $model->_findByOne($id);
    }


    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['activity_name','body', 'activity_start_timestamp'], 'required'],
            [['activity_end_timestamp','activity_start_timestamp'],
                'date', 'format' =>  Yii::$app->params['format_date_model']],
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