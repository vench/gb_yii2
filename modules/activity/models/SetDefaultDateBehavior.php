<?php
/**
 * Created by PhpStorm.
 * User: vench
 * Date: 18.12.18
 * Time: 22:11
 */

namespace app\modules\activity\models;


use yii\base\Behavior;
use yii\db\BaseActiveRecord;

/**
 * Class SetDefaultDateBehavior
 * @package app\modules\activity\models
 */
class SetDefaultDateBehavior extends Behavior
{



    /**
     * @var string
     */
    public $fieldValidate = null;

    /**
     * @var null
     */
    public $fieldDefault = null;


    /**
     * {@inheritdoc}
     */
    public function attach($owner)
    {
        $this->owner = $owner;
        $owner->on(BaseActiveRecord::EVENT_BEFORE_VALIDATE, [$this, 'beforeValidate']);
    }

    /**
     * {@inheritdoc}
     */
    public function detach()
    {
        if ($this->owner) {
            $this->owner->off(BaseActiveRecord::EVENT_BEFORE_VALIDATE, [$this, 'beforeValidate']);
            $this->owner = null;
        }
    }

    /**
     *
     */
    public function beforeValidate() {
        if(empty($this->owner->{$this->fieldValidate})) {
            $this->owner->{$this->fieldValidate} =
                $this->owner->{$this->fieldDefault} ;
        }
    }
}