<?php
/**
 * Created by PhpStorm.
 * User: vench
 * Date: 21.12.18
 * Time: 22:16
 */

namespace app\modules\activity\models;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;


class ActiveRecordCacheBehavior extends Behavior
{

    /**
     * @var string
     */
    public $cacheKeyName = null;

    /**
     * {@inheritdoc}
     */
    public function events()
    {


        if(is_null($this->cacheKeyName)) {
            $this->cacheKeyName = get_class($this->owner);
        }

        echo __METHOD__, PHP_EOL;

        return [
            BaseActiveRecord::EVENT_AFTER_INSERT => 'deleteCache',
            BaseActiveRecord::EVENT_AFTER_UPDATE => 'deleteCache',
            BaseActiveRecord::EVENT_AFTER_DELETE => 'deleteCache',
        ];
    }

    /**
     *
     */
    public function deleteCache() {
        echo  __METHOD__, PHP_EOL;
        foreach ($this->getCacheKeys() as $key) {

            echo "deleteCache: ", $key, PHP_EOL;
            Yii::$app->cache->delete($key);
        }
    }

    /**
     * @param $id
     * @return array|mixed|null|ActiveRecord
     */
    public function _findByOne($id){
        $key = $this->getCacheKeyOne($id);

        if( Yii::$app->cache->exists($key)) {
            return Yii::$app->cache->get($key);
        }

        $model =  $this->owner->findOne($id);

        if(!is_null($model)) {
            Yii::$app->cache->set($key, $model);
        }

        return $model;
    }





    /**
     * @return array
     */
    public function getCacheKeys() {
        return [
            $this->getCacheKeyOne($this->owner->getPrimaryKey()),
        ];
    }

    /**
     * @param $id
     * @return string
     */
    public function getCacheKeyOne($id) {
        return $this->cacheKeyName . "_" . $id;
    }
}