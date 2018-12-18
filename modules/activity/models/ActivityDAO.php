<?php
/**
 * Created by PhpStorm.
 * User: vench
 * Date: 11.12.18
 * Time: 22:15
 */

namespace app\modules\activity\models;

use \Yii;

/**
 * Class ActivityDAO
 * @package app\modules\activity\models
 */
class ActivityDAO
{

    /**
     * @var string
     */
    private $table = 'activity';


    /**
     * @param Activity|null $search
     * @return array
     */
    public function search(Activity $search = null) {
        if(is_null($search)) {
            $search = new Activity();
        }

        $db = Yii::$app->db;
        $params = [];
        $conditions = [];
        if(!empty($search->id_activity)) {
            $conditions[] = 'id_activity=:id_activity';
            $params[':id_activity'] = $search->id_activity;
        }

        $sql = 'SELECT * FROM '.$this->table.'';
        if(!empty($conditions)) {
            $sql .= ' WHERE '. join(' AND ', $conditions);
        }

        $data = $db->createCommand($sql, $params)
            ->queryAll(\PDO::FETCH_CLASS);

        $result = [];
        foreach ($data as $item) {
            $activity = new Activity();
            $activity->id_activity = $item->id_activity;
            $activity->activity_name = $item->activity_name;
            $activity->activity_start_timestamp = $item->activity_start_timestamp;
            $activity->activity_end_timestamp = $item->activity_end_timestamp;
            $activity->body = $item->body;
            $activity->id_user = $item->id_user;
            $result[] = $activity;
        }
        return $result;
    }

    /**
     * @param Activity $activity
     * @return bool
     */
    public function create(Activity $activity) {
        $db = Yii::$app->db;
        $result = $db->createCommand()
            ->insert($this->table, [
                'activity_name'             => $activity->activity_name,
                'activity_end_timestamp'    => $activity->activity_end_timestamp,
                'activity_start_timestamp'  => $activity->activity_start_timestamp,
                'body'                      => $activity->body,
                'id_user'                   => $activity->id_user,
                //'is_block'                  => $activity->is_block,
            ])->execute();

        return $result > 0;
    }
}