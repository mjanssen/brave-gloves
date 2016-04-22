<?php namespace Models\Session;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;

/**
 * Class SessionEffectiveTime
 * @package Models\Session;
 */
class SessionEffectiveTime extends Model
{
    public function initialize()
    {
        $this->setSource("session_effective_times");

        $this->belongsTo('user_id', 'Models\User\User', 'id', ['alias' => 'User']);
        $this->belongsTo('session_id', 'Models\Session\Session', 'id', ['alias' => 'Session']);

        $this->addBehavior(
            new Timestampable(
                [
                    'beforeCreate' => [
                        'field'  => 'timestamp_start',
                        'format' => 'Y-m-d H:i:s'
                    ]
                ]
            )
        );
    }
}
