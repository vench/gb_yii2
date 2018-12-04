<?php
/**
 * Created by PhpStorm.
 * User: vench
 * Date: 04.12.18
 * Time: 21:40
 */

namespace app\models;

use yii\base\Model;

/**
 * Class UserEvent
 * @package app\models
 */
class UserEvent extends Model
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
     * UserEvent constructor.
     * @param array $config
     * @param array $attributes
     */
    function __construct($config = [], $attributes = [])
    {
        parent::__construct($config);

        $this->setAttributes($attributes, false);
    }
}